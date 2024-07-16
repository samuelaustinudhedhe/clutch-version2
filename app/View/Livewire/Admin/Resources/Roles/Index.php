<?php

namespace App\View\Livewire\Admin\Resources\Roles;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $permissions;
    public $admin;
    public $search;
    public $action;
    public $perPage = 20;

    public function mount()
    {
        $this->permissions = Permission::all();
        $this->admin = getAdmin();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::search('name', $this->search)->paginate($this->perPage);

        return view('admin.resources.roles.index', [
            'roles' => $roles,
        ])->layout('layouts.admin');
    }
}
