<?php

namespace App\View\Livewire\Admin\Resources\Orders;

use App\Models\Order;
use App\View\Livewire\Resources\Orders\Index as OrdersIndex;
use Livewire\WithPagination;

class Index extends OrdersIndex
{
    use WithPagination;
    public function render()
    {
        $orders = Order::search('id', $this->search)->paginate($this->perPage);
        return view('admin.resources.orders.index', compact('orders'))->layout('layouts.admin');
    }
}
