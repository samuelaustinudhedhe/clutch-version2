<?php

namespace App\View\Livewire\Book;

use App\Models\Order;
use App\Models\Trip as mTrip;
use App\Models\Vehicle as mVehicle;
use App\View\Livewire\Guest\Vehicles\Show as VehicleShow;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Trip extends Component
{
    public $vehicle;
    public $trip;
    public $amount;
    public $email;
    public $reference;

    public function mount(mVehicle $vehicle)
    {
        $data = VehicleShow::getStoreData() ?? (object)[];
        $this->vehicle = $vehicle;
        
        // Fetching data from trip.json file based on the vehicle ID
        $id = $this->vehicle->id;
        if ($data->$id) {
            $this->trip = $data->$id;
        } else {
            $this->trip = (object)[];
        }

        // Set the amount for the payment (you may want to calculate this based on the trip details)
        $this->amount = 1000 * 100; // Amount in kobo (10 NGN)
        
        // Generate a unique reference for this transaction
        $this->reference = 'TRIP_' . uniqid();
    }

    public function initializePayment()
    {
        $url = 'https://api.paystack.co/transaction/initialize';
        $fields = [
            'email' => $this->email,
            'amount' => $this->amount,
            'reference' => $this->reference,
            'callback_url' => route('paystack.callback')
        ];

        $response = Http::withToken(config('services.paystack.secret_key'))
            ->post($url, $fields);

        if ($response->successful()) {
            $data = $response->json();
            return redirect($data['data']['authorization_url']);
        }

        // Handle error
        session()->flash('error', 'Unable to initialize payment.');
    }

    public function render()
    {
        return view('pages.book.trip', [
            'vehicle' => $this->vehicle,
            'trip' => $this->trip,
        ])->layout('layouts.app');
    }
}