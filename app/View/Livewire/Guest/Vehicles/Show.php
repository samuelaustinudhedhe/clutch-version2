<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;

class Show extends Component
{
    public $vehicle;

    public function mount(Vehicle $vehicle){
        $this->vehicle = Vehicle::find($vehicle);    
    }
    public function render()
    {
        return view('pages.vehicles.show')->layout('layouts.guest');
    }
}
