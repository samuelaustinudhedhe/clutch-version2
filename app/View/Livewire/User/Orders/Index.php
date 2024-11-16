<?php

namespace App\View\Livewire\User\Orders;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $user;
    public $search;
    public $perPage; 

    public function mount(){
        $this->user = getUser();
    }

    public function render()
    {
        $orders = $this->user->orders()->paginate($this->perPage);

        return view('user.orders.index',compact('orders'))->layout('layouts.user');
    }
}
