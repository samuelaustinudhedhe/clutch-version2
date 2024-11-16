<?php

namespace App\View\Livewire\User\Orders;

use App\Models\Order;
use App\View\Livewire\Resources\Orders\Show as OrdersShow;
use Livewire\Component;
use stdClass;

class Show extends OrdersShow
{
    public $queriedOrder;

    public function mount(Order $order)
    {
        // Check if the order belongs to the current user
        if ($order->authorable == getUser()) {
            // Load the order details and related data
            return $this->order = $order;
        } 

        return $this->queriedOrder = $order->id;

    }



    public function render()
    {
        return view('user.orders.show')->layout('layouts.user');
    }
}
