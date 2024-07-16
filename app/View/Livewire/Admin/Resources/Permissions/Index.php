<?php

namespace App\View\Livewire\Admin\Resources\Permissions;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    //add pagination
    public $roles;
    public $admin = [];
    public $search;
    public $action;
    public $perPage = 15;

    public function mount()
    {
        $this->roles = Role::all();
        $this->admin = getAdmin();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $permissions = Permission::search('name', $this->search)->paginate($this->perPage);

        return view('admin.resources.permissions.index',[
            'permissions' => $permissions,
        ])->layout('layouts.admin');
    }
}
