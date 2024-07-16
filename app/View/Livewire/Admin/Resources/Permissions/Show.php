<?php

namespace App\View\Livewire\Admin\Resources\Permissions;

use App\Models\Permission;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public $name;
    public $slug;
public function show($route)
{
    $permission = Permission::findOrFail($route->id);
    $this->id = $permission->id;
    $this->name = $permission->name;
    $this->slug = $permission->slug;
}
    public function render()
    {
        return view('admin.resources.permissions.show')->layout('layouts.admin');
    }
}
 