<?php

namespace App\View\Livewire\Guest\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $vehicles = [];
    public $search = '';
    public $perPage = 12;

    public function mount() {}


    public function render()
    {
        $vehicles = Vehicle::search('name', $this->search)->paginate($this->perPage);
        $vehiclesCount = Vehicle::all()->count();
        return view('pages.vehicles.index', [
            'vehicles' => $vehicles,
            'count' => $vehiclesCount,
            'search' => $this->search
        ])->layout('layouts.guest');
    }
}
