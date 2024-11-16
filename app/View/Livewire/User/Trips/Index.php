<?php

namespace App\View\Livewire\User\Trips;

use App\Models\Trip;
use App\View\Livewire\Resources\Trips\Index as TripsIndex;


class Index extends TripsIndex
{

    final function mount()
    {
        $this->user = getUser();
    }

    final function render()
    {
        $trips = $this->user->trips()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    
        return view('user.trips.index', compact('trips'))->layout('layouts.user');
    }

}