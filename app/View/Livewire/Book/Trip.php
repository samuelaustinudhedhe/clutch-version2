<?php

namespace App\View\Livewire\Book;

use App\Http\Controllers\Payments\PaystackPaymentController as PayStack;
use App\Models\Admin;
use App\Models\Order as mOrder;
use App\Models\Trip as mTrip;
use App\Models\Vehicle as mVehicle;
use App\Notifications\Trips\Booked\TripBookedForAdmins;
use App\Notifications\Trips\Booked\TripBookedForChauffeur;
use App\Notifications\Trips\Booked\TripBookedForOwner;
use App\Notifications\Trips\Booked\TripBookedForTraveler;
use App\Traits\Trips\TripData;
use App\View\Livewire\Guest\Vehicles\Show as VehicleShow;
use Illuminate\Auth\AuthenticationException;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Trip extends Component
{
    use TripData;

    public $vehicle;
    public $trip;
    public $amount;
    public $user;
    public $reference;

    public function mount(mVehicle $vehicle)
    {
        $this->user = getUser();
        $data = $this::getTripData() ?? (object)[];
        $this->vehicle = $vehicle;

        // Fetching data from trip.json file based on the vehicle ID
        $id = $this->vehicle->id;
        if (isset($data->$id)) {
            $this->trip = $data->$id;
        } else {
            $this->trip = (object)[];
        }

        // // Set the amount for the payment (you may want to calculate this based on the trip details)
        // $this->amount = $vehicle->calcTotalPrice($this->trip->days ?? 1, true, false) * 100; // Amount in kobo (10 NGN)

        // Calculate the total price for the trip based on the selected days and the vehicle's current price
        $currentPrice = $this->vehicle->getCurrentPrice($this->trip->days);
        $this->amount = $currentPrice['total_price'] * 100; // Convert to kobo

        // Generate a unique reference for this transaction
        $this->reference = 'TRIP_' . uniqid();

        $requestReference = request('reference');
        if ($requestReference) {
            $this->verifyPayment($requestReference);
        }
    }

    public function initializePayment()
    {
        // Authenticate user
        if (!auth()->check()) {
            throw new AuthenticationException('User must be logged in to book a trip.');
        }

        // Check for pending orders
        $this->checkPendingOrders();

        // Generate a unique reference for this transaction
        $paystack = new PayStack();
        $response = $paystack->initializePayment([
            'email' => $this->user->email,
            'amount' => $this->amount,
            'reference' => $this->reference,
            'callback_url' => route('checkout.callback', ['vehicle' => $this->vehicle->id])
        ]);

        if ($response['status']) {
            // Store initialized payment details in the session
            session(['pending_payment' => [
                'amount' => $this->amount,
                'reference' => $this->reference,
                'vehicle_id' => $this->vehicle->id,
                'trip_days' => $this->trip->days,
            ]]);

            return redirect($response['data']['authorization_url']);
        } else {
            session()->flash('error', 'Unable to initialize payment: ' . $response['message']);
        }
    }

    public function verifyPayment($reference)
    {
        $paystack = new PayStack();
        $response = $paystack->verifyPayment($reference);

        if ($response['status'] && $response['data']['status'] === 'success') {
            // Verify that the payment amount matches the current vehicle price
            $currentPrice = $this->vehicle->getCurrentPrice($this->trip->days);
            $paidAmount = $response['data']['amount'] / 100; // Convert from kobo to naira

            if ($paidAmount != $currentPrice['total_price']) {
                session()->flash('error', 'Payment amount does not match the current vehicle price. Please try booking again.');
                return redirect()->route('vehicles.show', $this->vehicle->id);
            }

            // Check if the user has any pending orders for the same vehicle and trip
            $this->checkPendingOrders();

            // Verify that the order is not already in the system
            $this->checkExistingOrder($response);

            // Payment was successful and amount is correct, proceed with booking
            $order = new mOrder([
                'details' => [
                    'reference' => $reference,
                ],
                'price' => [
                    'currency' => $this->trip->price->currency ?? app_currency(false),
                    'discount' => ($this->vehicle->discount() > 0) ? $this->vehicle->discounted_price : 0,
                    'tax' => $this->vehicle->calcTotalTax($this->trip->days),
                    'total' => $paidAmount,
                ],
                'payment' => [
                    'status' => 'paid',
                    'method' => 'paystack',
                    'access_code' => $response['data']['access_code'] ?? null,
                    'reference' => $response['data']['reference'],
                    'data' => $response['data'],
                ],
                'authorable_type' => get_class($this->user),
                'authorable_id' => $this->user->id,
            ]);

            // Create a trip and associate it with the order
            $trip = new mTrip([
                'status' => 'pending',
                'details' => [
                    'start' => [
                        'location' => $this->trip->start->location,
                        'timestamp' =>  $this->trip->start->timestamp,
                    ],
                    'end' => [
                        'location' => $this->trip->end->location,
                        'timestamp' =>  $this->trip->end->timestamp,
                    ],
                    'distance' => $this->trip->distance ?? null,
                    'price' => [
                        'currency' => $this->trip->price->currency,
                        'additional_cost' => '',
                        'total' => $paidAmount,
                        'total_paid' => $paidAmount,
                    ],
                    'passengers' => $this->trip->passengers,
                    'insurance' => $this->vehicle->documents->insurance,
                ],
                'vehicle_id' => $this->vehicle->id,
            ]);

            // Associate the trip with the user (traveler)
            $this->user->trips()->save($trip);
            // Create and Save the order            
            $trip->order()->save($order);

            // Notify the users and Admin
            $this->notify($trip);

            // Delete the trip data after booking
            $this::deleteTripData($this->vehicle);

            // Messages and redirects
            session()->flash('message', 'Payment successful! Your trip has been booked.');
            return redirect()->route('user.trips.show', $trip->id);
        }

        session()->flash('error', 'Payment verification failed.');
        return redirect()->route('vehicles.show', $this->vehicle->id);
    }

    /**
     * Checks for pending orders for the current user and vehicle.
     *
     * This function queries the database for any existing pending orders
     * that belong to the current user and are associated with the current vehicle.
     * If a pending order is found, it redirects the user to that order's page
     * with an error message.
     *
     * @return void|Illuminate\Http\RedirectResponse Returns void if no pending order is found,
     *                                               or a redirect response if a pending order exists.
     */
    private function checkPendingOrders()
    {
        $pendingOrder = mOrder::where('authorable_id', $this->user->id)
            ->where('authorable_type', get_class($this->user))
            ->whereHas('orderable', function ($query) {
                $query->where('vehicle_id', $this->vehicle->id)
                    ->where('status', 'pending');
            })
            ->first();

        if ($pendingOrder) {
            session()->flash('error', 'You already have a pending order for this vehicle. Please complete or cancel your existing order before creating a new one.');
            return redirect()->route('user.orders.show', $pendingOrder->id);
        }
    }

    /**
     * Check if an order with the given access code or reference already exists.
     *
     * This function verifies whether an order has already been processed
     * for the current transaction by checking the access code and reference
     * against existing orders in the database.
     *
     * @param array $response The response from the Paystack API containing payment details.
     * @throws \Exception If the $response variable is not defined or doesn't contain the expected data.
     * @return void
     */
    final function checkExistingOrder($response)
    {
        // Check if the access code is already associated with an existing order
        $accessCode = $response['data']['access_code'] ?? null;
        $reference = $response['data']['reference'] ?? null;

        $existingOrder = mOrder::where(function ($query) use ($accessCode, $reference) {
            $query->where('payment->access_code', $accessCode)
                ->orWhere('payment->reference', $reference);
        })->first();

        if ($existingOrder) {
            session()->flash('error', 'This payment has already been processed. If you believe this is an error, <a href="' . url('/pages/contact') . '" class="text-blue-600 dark:text-blue-400 hover:underline" >please contact support.</a>');
            return redirect()->back();
        }
    }

    /**
     * Sends notifications to relevant parties about a newly booked trip.
     * 
     * This function notifies the traveler, vehicle owner, and admin about a new trip booking.
     * It uses different notification classes for each type of recipient.
     * 
     * @param mixed $trip The trip object containing details of the booked trip.
     * 
     * @return void This function doesn't return a value.
     */
    final function notify($trip)
    {
        // Notify the traveler of the booking
        $this->user->notify(new TripBookedForTraveler($trip));
        // Notify the vehicle owner of the booking
        $this->vehicle->owner->notify(new TripBookedForOwner($trip));
        // Notify the admin of the booking (for now, we're assuming only one superadmin)
        Admin::where('role', 'superadmin')->first()->notify(new TripBookedForAdmins($trip));
        //$this->vehicle->chauffeur->notify(new TripBookedForChauffeur($trip));
    }


    public function render()
    {
        return view('pages.book.trip', [
            'vehicle' => $this->vehicle,
            'trip' => $this->trip,
        ])->layout('layouts.app');
    }
}
