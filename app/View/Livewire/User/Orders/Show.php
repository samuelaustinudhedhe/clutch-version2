<?php

namespace App\View\Livewire\User\Orders;

use App\Models\Order;
use App\View\Livewire\Resources\Orders\Show as OrdersShow;
use Livewire\Component;

class Show extends OrdersShow
{
    public function condition()
    {
        return $this->order->authorable == getUser();
    }

    public function render()
    {
        return view('user.orders.show')->layout('layouts.user');
    }
}