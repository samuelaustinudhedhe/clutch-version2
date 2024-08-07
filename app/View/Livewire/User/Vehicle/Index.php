<?php

namespace App\View\Livewire\User\Vehicle;

use App\Models\Vehicle;
use Livewire\Component;

class Index extends Component
{
    public $vehicles;
    public $owner; # Current owner details

    ##Filters##
    public $search; # Search query for filtering vehicles
    public $perPage = 10; # Default number of vehicles per page
    public $selected = []; # Array to hold vehicles currently being displayed
    public $selectAll = false; # Boolean to track the select all checkbox
    public $currentPageVehicles; # Array to hold vehicles currently being displayed


    public function mount()
    {
        $this->owner = getUser();
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
        $vehicles = Vehicle::search('name', $this->search)->whereJsonContains('owner', ['id' => $this->owner->id, 'type' => get_class($this->owner)])->paginate($this->perPage);
        
        $this->currentPageVehicles = $vehicles->pluck('id')->toArray();

        $vehiclesCount = Vehicle::all()->count();
        return view('user.vehicle.index', compact('vehicles', 'vehiclesCount'))->layout('layouts.user');
    }
}
