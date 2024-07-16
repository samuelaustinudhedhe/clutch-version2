<?php

namespace App\View\Livewire\Admin\Resources\Permissions;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('admin.resources.permissions.create')->layout('layouts.admin');
    }
}
