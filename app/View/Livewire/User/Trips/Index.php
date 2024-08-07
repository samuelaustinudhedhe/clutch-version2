<?php

namespace App\View\Livewire\User\Trips;

use Livewire\Component;

class Index extends Component
{


    public function render()
    {
        return view('user.trips.index')->layout('layouts.user');
    }
}
