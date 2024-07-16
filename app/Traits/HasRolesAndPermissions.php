<?php

namespace App\Traits;

use App\Models\Role;

trait HasRolesAndPermissions
{
    /**
     * Check if the model has a specific role or any of the given roles.
     *
     * @param string|array $roles The role or roles to check for.
     * @return bool True if the model has the specified role or any of the given roles, false otherwise.
     */
    public function is($roles)
    {
        if (is_array($roles)) {
            return in_array($this->role, $roles);
        }

        return $this->role === $roles;
    }

    /**
     * Check if the model has a specific permission.
     *
     * @param string $permission The permission to check for.
     * @return bool True if the model has the specified permission, false otherwise.
     */
    public function hasPermission($permissions)
    {
        $role = Role::where('slug', $this->role)->first();

        if ($role) {
            $rolePermissions = $role->permissions;

            if (is_array($permissions)) {
                return !empty(array_intersect($permissions, $rolePermissions));
            }

            return in_array($permissions, $rolePermissions);
        }

        return false;
    }

    /**
     * Check if the model has a specific permission.
     *
     * This method is required to match Laravel's authorization signature.
     * 
     * @param string $permission The permission to check for.
     * @param array $arguments Optional additional arguments (not used here).
     * @return bool True if the model has the specified permission, false otherwise.
     */
    public function can($permission, $arguments = [])
    {
        return $this->hasPermission($permission);
    }
    
}
