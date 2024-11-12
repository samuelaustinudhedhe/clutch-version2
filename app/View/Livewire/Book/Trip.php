<?php

namespace App\View\Livewire\Book;

use App\Http\Controllers\Payments\PaystackPaymentController as PayStack;
use App\Models\Order as mOrder;
use App\Models\Trip as mTrip;
use App\Models\Vehicle as mVehicle;
use App\Traits\Trips\TripData;
use App\View\Livewire\Guest\Vehicles\Show as VehicleShow;
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

        // Set the amount for the payment (you may want to calculate this based on the trip details)
        $this->amount = $vehicle->calcTotalPrice($this->trip->days ?? 1, true, false) * 100; // Amount in kobo (10 NGN)

        // Generate a unique reference for this transaction
        $this->reference = 'TRIP_' . uniqid();

        $requestReference = request('reference');
        if (!$requestReference) {
            //session()->flash('error', 'No payment reference found.');
        } else {
            $this->verifyPayment($requestReference);
        }
    }

    public function initializePayment()
    {
        $paystack = new PayStack();
        $response = $paystack->initializePayment([
            'email' => $this->user->email,
            'amount' => $this->amount,
            'reference' => $this->reference,
            'callback_url' => route('checkout.callback', ['vehicle' => $this->vehicle->id])
        ]);

        if ($response['status']) {
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

            // Payment was successful, save the order
            $order = new mOrder([
                'details' => [
                    'vehicle_id' => $this->vehicle->id,
                    'trip_id' => null,
                    'reference' => $reference,
                ],
                'price' => [
                    'currency' => $this->trip->price->currency ?? app_currency(false),
                    'discount' => ($this->vehicle->discount() > 0) ? $this->vehicle->discounted_price : 0,
                    'tax' => $this->vehicle->calcTotalTax($this->trip->days),
                    'total' => $this->amount / 100,
                ],
                'payment' => [
                    'status' => 'paid',
                    'method' => 'paystack',
                    'access_code' => $response['data']['access_code'] ?? null,
                ],

                // Associate the order with the user (author) and the trip
                'authorable_type' => get_class($this->user),
                'authorable_id' => $this->user->id,
            ]);

            // create a trip and associate it with the order
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
                        'total' => $this->amount / 100,
                        'total_paid' => $this->amount / 100,
                    ],
                    'passengers' => $this->trip->passengers,
                    'insurance' => $this->vehicle->documents->insurance, //change to trips insurance
                ],

                'vehicle_id' => $this->vehicle->id,
            ]);

            // Associate the trip with the user (traveler)
            $this->user->trips()->save($trip);
            // create and Save the order            
            $trip->order()->save($order);

            // Delete the trip data after booking
            $this::deleteTripData($this->vehicle);

            // Messages and redirects
            session()->flash('message', 'Payment successful! Your trip has been booked.');
            return redirect()->route('user.trips.show', $trip->id);
        }

        session()->flash('error', 'Payment verification failed.');
    }


    public function render()
    {
        return view('pages.book.trip', [
            'vehicle' => $this->vehicle,
            'trip' => $this->trip,
        ])->layout('layouts.app');
    }
}
