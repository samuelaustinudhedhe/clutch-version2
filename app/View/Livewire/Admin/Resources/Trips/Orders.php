<?php

namespace App\View\Livewire\Admin\Resources\Trips;

use App\View\Livewire\Resources\Trips\Show as TripShow;
use Livewire\Component;

class Orders extends TripShow
{
    public function render()
    {
        $trip = $this->trip;
        $orders = $this->trip->orders;
        return view('admin.resources.trips.orders', compact('orders','trip'))->layout('layouts.admin');
    }
}
