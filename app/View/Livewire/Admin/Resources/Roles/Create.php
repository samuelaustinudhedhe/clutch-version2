<?php

namespace App\View\Livewire\Admin\Resources\Roles;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public $name;
    public $slug;
    public $description;
    public $selectedAdmins = [];
    public $selectedUsers = [];
    public $selectedPermissions = [];
    public $guard = 'web';
    public $perPage = 10;
    public $search = '';

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
        'slug' => 'required|max:255|unique:roles,slug',
        'description' => 'nullable|string|max:1000',
        'guard' => 'required|in:web,admin',
        'selectedPermissions' => 'array|exists:permissions,slug',
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->selectedPermissions = [];
        $this->selectedUsers = [];
        $this->selectedAdmins = [];
        $this->guard = '';
    }
    public function updatedName()
    {
        if (empty($this->slug)) {
            $this->slug = toSlug($this->name);
        }
    }
    public function store()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'guard' => $this->guard,
            'permissions' => $this->selectedPermissions,
        ]);

        // Assign role to the selected users or admins
        if ($this->guard == 'admin') {
            Admin::whereIn('id', $this->selectedAdmins)->update(['role' => $role->slug]);
        } else {
            User::whereIn('id', $this->selectedUsers)->update(['role' => $role->slug]);
        }

        // Reset fields after creating role and assigning it to the user
        $this->resetInputFields();

        // Emit an event or show a success message
        session()->flash('message', empty($this->selectedAdmins) && empty($this->selectedUsers)
            ? 'Role created successfully.'
            : 'Role created and assigned to users successfully.');
    }

    public function render()
    {
        $users = $this->guard == 'web'
            ? User::search('name', $this->search)->paginate($this->perPage)
            : Admin::search('name', $this->search)->paginate($this->perPage);

        return view('admin.resources.roles.create', [
            'users' => $users,
            'permissions' => Permission::all(),
        ])->layout('layouts.admin');
    }
}
