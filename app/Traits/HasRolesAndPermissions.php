<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

trait HasRolesAndPermissions
{
    /**
     * Check if the model has any of the given roles.
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles): bool
    {
        return in_array($this->role, Arr::wrap($roles));
    }

    /**
     * Check if the model has a specific role or any of the given roles.
     *
     * @param string|array $roles The role or roles to check for.
     * @return bool True if the model has the specified role or any of the given roles, false otherwise.
     */
    public function is($roles)
    {
        return $this->hasRole($roles);
    }

    /**
     * Check if the model has all of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAllRoles(array $roles): bool
    {
        return $this->hasRole($roles) && count($roles) === 1;
    }

    /**
     * Check if the person (User|Admin) has any of the given permissions.
     *
     * @param string|array $permissions
     * @return bool
     */
    public function hasPermission($permissions): bool
    {
        $rolePermissions = $this->getRolePermissions();
        $permissions = Arr::wrap($permissions);

        return !empty(array_intersect($permissions, $rolePermissions));
    }

    /**
     * Check if the model has all of the given permissions.
     *
     * @param array $permissions
     * @return bool
     */
    public function hasAllPermissions(array $permissions): bool
    {
        $rolePermissions = $this->getRolePermissions();

        return count(array_intersect($permissions, $rolePermissions)) === count($permissions);
    }

    /**
     * Get the permissions for the model's role.
     *
     * @return array
     */
    protected function getRolePermissions(): array
    {
        return Role::where('slug', $this->role)->value('permissions') ?? [];
    }

    /**
     * Assign a role to the model.
     *
     * @param string $role
     * @return bool
     */
    public function assignRole(string $role): bool
    {
        $roleModel = Role::where('slug', $role)->first();

        if (!$roleModel || !$this->isValidRoleForModel($roleModel)) {
            return false;
        }

        $this->role = $role;
        return $this->save();
    }

    /**
     * Revoke the current role from the model.
     *
     * @return bool
     */
    public function revokeRole(): bool
    {
        $defaultRole = $this->getDefaultRole();
        $this->role = $defaultRole;
        return $this->save();
    }

    /**
     * Scope a query to only include models with specific roles.
     *
     * @param Builder $query
     * @param string|array $roles
     * @param bool $matchAll
     * @return Builder
     */
    public function scopeWithRoles(Builder $query, $roles, bool $matchAll = false): Builder
    {
        $roles = Arr::wrap($roles);

        return $matchAll
            ? $query->whereIn('role', $roles)->havingRaw('COUNT(DISTINCT role) = ?', [count($roles)])
            : $query->whereIn('role', $roles);
    }

    /**
     * Check if the given role is valid for the current model.
     *
     * @param Role $role
     * @return bool
     */
    protected function isValidRoleForModel(Role $role): bool
    {
        $modelGuard = $this instanceof \App\Models\User ? 'web' : 'admin';
        return $role->guard === $modelGuard;
    }

    /**
     * Get the default role for the current model.
     *
     * @return string
     */
    protected function getDefaultRole(): string
    {
        return $this instanceof \App\Models\User ? 'subscriber' : 'basic_admin';
    }
}