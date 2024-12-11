<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $ordersPerPage = 10;
    public $orderssearch = '';

    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        $orders = $this->user->orders()->search('id', $this->orderssearch)->paginate($this->ordersPerPage);
        return view('admin.resources.users.show', compact('orders'))->layout('layouts.admin');
    }
}
