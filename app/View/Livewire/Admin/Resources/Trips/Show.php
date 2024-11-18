<?php

namespace App\View\Livewire\Admin\Resources\Trips;

use App\View\Livewire\Resources\Trips\Show as TripsShow;
use Livewire\Component;

class Show extends TripsShow
{
    public function render()
    {
        return view('admin.resources.trips.show')->layout('layouts.admin');
    }
}
