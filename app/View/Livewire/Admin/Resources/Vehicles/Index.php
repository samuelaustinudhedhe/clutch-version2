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
    public $selectAll = false; // Boolean to track the select all checkbox
    public $currentPageVehicles; // Array to hold vehicles currently being displayed

    public function mount()
    {
        
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->currentPageVehicles;
        } else {
            $this->selected = [];
        }
    }

    private function resetSelection()
    {
        $this->selected = [];
        $this->selectAll = false;
    }


    public function render()
    {
        $vehicles = Vehicle::search('name', $this->search)->paginate($this->perPage);
        $this->currentPageVehicles = $vehicles->pluck('id')->toArray();

        $vehiclesCount = Vehicle::all()->count();
        return view('admin.resources.vehicle.index', compact('vehicles','vehiclesCount'))
            ->layout('layouts.admin');
    }
}
