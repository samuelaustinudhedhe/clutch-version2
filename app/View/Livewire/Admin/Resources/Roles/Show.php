<?php

namespace App\View\Livewire\Admin\Resources\Roles;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('admin.resources.roles.show')->layout('layouts.admin');
    }
}
