<?php

namespace App\View\Livewire\Admin\Resources\Orders;

use App\View\Livewire\Resources\Orders\Show as OrdersShow;

class Show extends OrdersShow
{
    public function condition()
    {
        return true;
    }

    public function render()
    {
        return view('admin.resources.orders.show')->layout('layouts.admin');
    }
}
