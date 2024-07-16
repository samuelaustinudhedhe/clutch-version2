<?php

use App\Models\Role;
use App\Models\Permission;

if (!function_exists('getRoleBy')) {

    /**
     * Get a role by slug, ID, or name.
     *
     * This function retrieves a role model based on the provided identifier,
     * which can be a slug, ID, or name. It returns the role model if found,
     * or null if no matching role is found.
     *
     * @param string|int $identifier The identifier to search by (slug, ID, or name).
     * @return \App\Models\Role|null The role model if found, otherwise null.
     */
    function getRoleBy($identifier)
    {
        // Check if the identifier is numeric, assume it is an ID
        if (is_numeric($identifier)) {
            $role = Role::find($identifier);
        }

        // Otherwise, assume it is a string and attempt to find by slug or name
        $role = Role::where('slug', $identifier)->orWhere('name', $identifier)->first();

        return $role ?? collect([]);
    }
}

if (!function_exists('getRolesByPermission')) {

    /**
     * Get the roles associated with a specific permission.
     *
     * @param string $permissionName The name (slug) of the permission.
     * @return \Illuminate\Database\Eloquent\Collection|null A collection of roles if the permission exists, or null if it does not.
     */
    function getRolesByPermission($permissionName)
    {
        // Find the permission by its slug
        $permission = Permission::where('slug', $permissionName)->first();

        // If the permission exists, return the associated roles
        if ($permission) {
            return $permission->roles;
        }

        // Return null if the permission does not exist
        return null;
    }
}

if (!function_exists('roleHasPermission')) {

    /**
     * Check if a role has a certain permission.
     *
     * This function checks whether a given role slug is associated with a specific permission slug.
     * It first retrieves the role from the database using the provided role slug.
     * If the role exists, it then checks if the specified permission slug (or an array of permission slugs) is associated with that role.
     *
     * @param string $roleSlug The slug of the role to check.
     * @param string|array $permissionSlugs The slug(s) of the permission(s) to check against.
     * @return bool|null True if the role has the specified permission, false otherwise. Returns null if the role does not exist.
     */
    function roleHasPermission(string $role, $permissions)
    {
        // Retrieve the role by its slug
        $role = getRoleBy($role);

        // If the role does not exist, return null
        if (!$role) {
            return null;
        }

        // Retrieve permission slugs associated with the role
        $role = $role->permissions;

        // If the permission slugs parameter is an array, check each permission in the array
        if (is_array($permissions)) {
            foreach ($permissions as $slug) {
                // If any permission is not associated with the role, return false
                if (!in_array($slug, $role)) {
                    return false;
                }
            }
            // If all permissions are associated with the role, return true
            return true;
        }

        // Check if the single permission slug is associated with the role
        return in_array($permissions, $role);
    }
}

if (!function_exists('getRolesWithPermissions')) {

    /**
     * Get a list of roles that have certain permission or permissions.
     *
     * This function fetches roles from the database that are associated with the specified permission slugs.
     * It returns a collection of roles.
     *
     * @param mixed $permissions The slug or array of slugs of the permissions to check against.
     * @return \Illuminate\Database\Eloquent\Collection The collection of roles with the specified permissions.
     */
    function getRoleWithPermissions($permissions)
    {
        // Ensure permissions is an array
        if (!is_array($permissions)) {
            $permissions = [$permissions];
        }

        // Get all roles
        $roles = Role::all();

        // Initialize a collection to store roles with specified permissions
        $rolesWithPermissions = collect();

        // Iterate through each role to check if it has the specified permissions
        foreach ($roles as $role) {
            // Fetch the role's permissions
            $rolePermissions = $role->permissions;

            // Check if the role has all the specified permissions
            $hasAllPermissions = !array_diff($permissions, $rolePermissions);

            // If the role has all the specified permissions, add it to the collection
            if ($hasAllPermissions) {
                $rolesWithPermissions->push($role);
            }
        }

        return $rolesWithPermissions;
    }
}

if (!function_exists('getRoleByPermission')) {

    /**
     * Get a role that has a specific permission.
     *
     * This function fetches a role from the database that is associated with the specified permission slug.
     * It returns the role if found, otherwise null.
     *
     * @param string $permission The slug of the permission to check against.
     * @return \App\Models\Role|null The role with the specified permission, or null if no role is found.
     */
    function getRoleByPermission($permission)
    {
        // Get all roles
        $roles = Role::all();

        // Iterate through each role to check if it has the specified permission
        foreach ($roles as $role) {
            // Fetch the role's permissions
            $rolePermissions = $role->permissions;

            // Check if the role has the specified permission
            if (in_array($permission, $rolePermissions)) {
                return $role;
            }
        }

        // Return null if no role with the specified permission is found
        return null;
    }
}

if (!function_exists('hasRole')) {
    /**
     * Checks if a user has a specific role.
     *
     * @param Object $user
     * @param array|string $roles
     * @return bool
     */
    function hasRole($user, $roles)
    {
        // If there is no authenticated user, return null
        if (!$user) {
            return null;
        }

        // Get the role slug of the user
        $userRole = $user->role;

        // If roles parameter is an array, check each role
        if (is_array($roles)) {
            foreach ($roles as $role) {
                // If any of the roles is found in the user's role, return true
                if ($userRole === $role) {
                    return true;
                }
            }
            // None of the roles matched, return false
            return false;
        }

        // If roles parameter is a string, check if it matches the user's role
        return $userRole === $roles;
    }
}
