<?php

namespace App\View\Livewire\Resources\Bookings;

use Livewire\Component;

abstract class Booking extends Component
{
    
    public function render()
    {
        return view('resources.bookings.booking');
    }
}
