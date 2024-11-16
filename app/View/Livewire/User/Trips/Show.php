<?php

namespace App\View\Livewire\User\Trips;


use App\View\Livewire\Resources\Trips\Show as TripsShow;

class Show extends TripsShow
{

    public function render()
    {
        return view('user.trips.show')
            ->layout('layouts.user');
    }
}
