<?php

namespace App\View\Livewire\Admin\Resources\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $vehicle;
    public $brand;
    public $search;
    public $perPage;
    public $price;
    public $rating;
    public $location;
    public $trips;

    public $selected = [];

    public function mount()
    {
        
    }



    public function render()
    {
        $vehicles = Vehicle::search('name', $this->search)->paginate($this->perPage);
        $vehiclesCount = Vehicle::all()->count();
        return view('admin.resources.vehicle.index', compact('vehicles','vehiclesCount'))
            ->layout('layouts.admin');
    }
}
