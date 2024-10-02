<?php

namespace App\View\Livewire\Book;

use App\Models\Order;
use App\Models\Trip as mTrip;
use App\Models\Vehicle as mVehicle;
use App\View\Livewire\Guest\Vehicles\Show as VehicleShow;
use Livewire\Component;

class Trip extends Component
{
    public $vehicle;
    public $trip;

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
    }

    public function render()
    {
        return view('pages.book.trip', [
            'vehicle' => $this->vehicle,
            'trip' => $this->trip,
        ])->layout('layouts.app');
    }
}
