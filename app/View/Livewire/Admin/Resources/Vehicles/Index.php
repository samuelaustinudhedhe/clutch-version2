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

    public function mount()
    {
        
    }

    public function updatingSearch(){

    }

    public function render()
    {
        $vehicle = Vehicle::search('name', $this->search)->paginate($this->perPage);
        return view('admin.resources.vehicle.index', compact('vehicle',))
            ->layout('layouts.admin');
    }
}
