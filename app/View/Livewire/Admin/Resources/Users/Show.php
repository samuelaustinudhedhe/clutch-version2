<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('admin.resources.users.show')->layout('layouts.admin');
    }
}
