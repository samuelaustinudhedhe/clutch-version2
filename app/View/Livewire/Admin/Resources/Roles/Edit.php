<?php

namespace App\View\Livewire\Admin\Resources\Roles;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Edit extends Component
{
    use WithPagination;

    public $role;
    public $name;
    public $slug;
    public $description;
    public $permissions;
    public $selectedAdmins = [];
    public $selectedPermissions = [];
    public $selectedUsers = [];
    public $guard;
    public $perPage = 10;
    public $search = '';

    protected $rules = [
        'description' => 'required|string|max:255',
    ];

    /**
     * Mount the component and initialize variables.
     *
     * @param string $role Slug of the role to be edited.
     */
    public function mount($role)
    {
        $this->role = Role::where('slug', $role)->firstOrFail();
        $this->name = $this->role->name;
        $this->slug = $this->role->slug;
        $this->description = $this->role->description;
        $this->guard = $this->role->guard;
        $this->selectedPermissions = $this->role->permissions;

        if ($this->guard == 'admin') {
            $this->selectedAdmins = Admin::where('role', $this->role->slug)->pluck('id')->toArray();
        } else {
            $this->selectedUsers = User::where('role', $this->role->slug)->pluck('id')->toArray();
        }

        $this->permissions = Permission::all();
    }

    /**
     * Update the role and its assigned users.
     */
    public function update()
    {
        $this->validate([
            'description' => 'nullable|string|max:255',
        ]);

        $this->role->update([
            'description' => $this->description,
            'permissions' => $this->selectedPermissions,
        ]);

        $this->updateUsersOrAdmins($this->role);

        // Emit an event or show a success message
        session()->flash('message', 'Role updated and assigned to users successfully.');
    }

    /**
     * Update the role assignment for users or admins.
     *
     * @param Role $role The role to be updated.
     */
    public function updateUsersOrAdmins($role)
    {
        if ($this->guard == 'admin') {
            $currentAdmins = Admin::where('role', $role->slug)->pluck('id')->toArray();
            $adminsToUpdate = $this->selectedAdmins;
            $adminsToUnassign = array_diff($currentAdmins, $adminsToUpdate);

            Admin::whereIn('id', $adminsToUpdate)->update(['role' => $role->slug]);
            Admin::whereIn('id', $adminsToUnassign)->update(['role' => 'default']);
        } else {
            $currentUsers = User::where('role', $role->slug)->pluck('id')->toArray();
            $usersToUpdate = $this->selectedUsers;
            $usersToUnassign = array_diff($currentUsers, $usersToUpdate);

            User::whereIn('id', $usersToUpdate)->update(['role' => $role->slug]);
            User::whereIn('id', $usersToUnassign)->update(['role' => 'subscriber']);
        }
    }

    /**
     * Delete the role and update the users with the deleted role.
     */
    public function delete()
    {
        if (in_array($this->role->slug , Role::INDELIBLE)) {
            // Display an error message or prevent deletion
            session()->flash('message', 'Cannot delete the role.');
            return redirect()->route('admin.roles.index');
        }

        if ($this->guard == 'admin') {
            Admin::where('role', $this->role->slug)->update(['role' => Role::DEFAULT_ADMIN_ROLE]);
        } else {
            User::where('role', $this->role->slug)->update(['role' => Role::DEFAULT_USER_ROLE]);
        }

        $this->role->delete();

        session()->flash('message', 'Role deleted and users updated successfully.');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->guard == 'web') {
            $users = User::search('name', $this->search)->orderByField('role', $this->name)->paginate($this->perPage);
        } else {
            $users = Admin::search('name', $this->search)->orderByField('role', $this->name)->paginate($this->perPage);
        }

        $permissions = Permission::all();
        return view('admin.resources.roles.edit', compact('users', 'permissions'))
            ->layout('layouts.admin');
    }
}
