<?php

namespace App\View\Livewire\Admin\Resources\Permissions;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('admin.resources.permissions.edit')->layout('layouts.admin');
    }
}
