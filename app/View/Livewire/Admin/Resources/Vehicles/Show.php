<?php

namespace App\View\Livewire\Admin\Resources\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;

class Show extends Component
{
    public $vehicle;
    public function mount(Vehicle $vehicle){
        $this->vehicle = $vehicle;
    }
    
    public function render()
    {
        return view('admin.resources.vehicles.show')->layout('layouts.admin');

    }
}
