<?php

namespace App\View\Livewire\Admin\Resources\Trips;

use App\Models\Trip;
use App\View\Livewire\Resources\Trips\Index as TripsIndex;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends TripsIndex
{
    use WithPagination;

    public function mount(){


    }

    public function render()
    {
        $trips = Trip::all();
        return view('admin.resources.trips.index', compact('trips'))->layout('layouts.admin');
    }
}