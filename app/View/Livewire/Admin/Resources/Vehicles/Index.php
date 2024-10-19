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

    public function changeVehicleStatus($vehicleId, $newStatus, $passedTense )
    {
        $vehicle = Vehicle::find($vehicleId);
        if ($vehicle) {
            $vehicle->status = $newStatus;
            $vehicle->save();
            $this->dispatch('notify', 'Vehicle '.$passedTense.' successfully.', 'success');
            //session()->flash('message', 'Vehicle status updated successfully.');
        } else {
            //session()->flash('error', 'Vehicle not found.');
            $this->dispatch('notify', 'Vehicle not found.', 'error');
        }
    }

    public function deleteVehicles($vehicleId){

        $this->changeVehicleStatus($vehicleId, 'delete', 'deleted');
        $this->resetSelection();
        $this->dispatch('notify', 'Vehicles deleted successfully.', 'success');
        //session()->flash('message', 'Vehicles deleted successfully.');
    }

    public function render()
    {
        //add a feature to show only to superadmins etc t show vehicles that are deleted
        $vehicles = Vehicle::where('status', '!=', 'delete') // Exclude vehicles with status 'delete'
        ->search('name', $this->search)
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);
            
        $this->currentPageVehicles = $vehicles->pluck('id')->toArray();

        $vehiclesCount = Vehicle::all()->count();
        return view('admin.resources.vehicles.index', compact('vehicles','vehiclesCount'))
            ->layout('layouts.admin');
    }
}
