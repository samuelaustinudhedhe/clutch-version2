<?php

namespace App\View\Livewire\User\Orders;

use App\View\Livewire\Resources\Orders\Index as OrdersIndex;
use Livewire\WithPagination;

class Index extends OrdersIndex
{
    public function mount(){
        $this->user = getUser();
    }

    public function render()
    {
        $orders = $this->user->orders()->paginate($this->perPage);

        return view('user.orders.index',compact('orders'))->layout('layouts.user');
    }
}
