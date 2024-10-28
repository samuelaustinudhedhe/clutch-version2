<?php

use App\Models\Permission;
use App\Models\Role;

if (!function_exists('hasPermissions')) {

    /**
     * Checks if a user has the specified permissions.
     *
     * This function verifies whether the given user has the specified permissions
     * based on their assigned role.
     *
     * @param \App\Models\User|\App\Models\Admin $user The user to check permissions for.
     * @param string|array $permissions The permission or array of permissions to check.
     * @return bool Returns true if the user has the specified permissions, false otherwise.
     */
    function hasPermissions($person, $permissions)
    {
        if (!$person) {
            return false;
        }
        $role = getRoleBy($person->role);

        return roleHasPermission($role->slug, $permissions);
    }
}


if (!function_exists('getPermissionBy')) {

    /**
     * Get a permission by slug, ID, or name.
     *
     * This function retrieves a permission model based on the provided identifier,
     * which can be a slug, ID, or name. It returns the permission model if found,
     * or null if no matching permission is found.
     *
     * @param string|int $identifier The identifier to search by (slug, ID, or name).
     * @return \App\Models\Permission|null The permission model if found, otherwise null.
     */
    function getPermissionBy($identifier)
    {
        // Check if the identifier is numeric, assume it is an ID
        if (is_numeric($identifier)) {
            $permission = Permission::find($identifier);
        }

        // Otherwise, assume it is a string and attempt to find by slug or name
        $permission = Permission::where('slug', $identifier)->orWhere('name', $identifier)->first();

        return $permission ?? collect([]);
    }
}

if (!function_exists('getPermissionsByRole')) {

    /**
     * Get the permissions associated with a specific role.
     *
     * @param string $permissionName The name (slug) of the permission.
     * @return \Illuminate\Database\Eloquent\Collection|null A collection of roles if the permission exists, or null if it does not.
     */
    function getPermissionsByRole($permissionName)
    {
        // Find the permission by its slug-
        $permission = Role::where('slug', $permissionName)->first();

        // If the permission exists, return the associated roles
        if ($permission) {
            return $permission->roles;
        }

        // Return null if the permission does not exist
        return null;
    }
}  

if (!function_exists('permissionHasRole')) {

    /**
     * Check if a permission has a certain role.
     *
     * This function checks whether a given permission slug is associated with a specific role slug.
     * It first retrieves the permission from the database using the provided permission slug.
     * If the permission exists, it then checks if the specified role slug (or an array of role slugs) is associated with that permission.
     *
     * @param string $permission The slug of the permission to check.
     * @param string|array $roles The slug(s) of the role(s) to check against.
     * @return bool|null True if the permission has the specified role, false otherwise. Returns null if the permission does not exist.
     */
    function permissionHasRole(string $permission, $roles)
    {
        // Retrieve the permission by its slug
        $permission = getPermissionBy($permission);

        // If the permission does not exist, return null
        if (!$permission) {
            return null;
        }

        // Retrieve role slugs associated with the permission
        $permission = $permission->roles;

        // If the role slugs parameter is an array, check each role in the array
        if (is_array($roles)) {
            foreach ($roles as $slug) {
                // If any role is not associated with the permission, return false
                if (!in_array($slug, $permission)) {
                    return false;
                }
            }
            // If all roles are associated with the permission, return true
            return true;
        }

        // Check if the single role slug is associated with the permission
        return in_array($roles, $permission);
    }
}


if (!function_exists('getPermissionsWithRoles')) {

    /**
     * Get a list of permissions that have certain role or roles.
     *
     * This function fetches permissions from the database that are associated with the specified role slugs.
     * It returns a collection of permissions.
     *
     * @param mixed $roles The slug or array of slugs of the roles to check against.
     * @return \Illuminate\Database\Eloquent\Collection The collection of permissions with the specified roles.
     */
    function getPermissionsWithRoles($roles)
    {
        // Ensure roles is an array
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        // Get all permissions
        $permissions = Permission::all();

        // Initialize a collection to store permissions with specified roles
        $permissionsWithRoles = collect();

        // Iterate through each permission to check if it has the specified roles
        foreach ($permissions as $permission) {
            // Fetch the permission's roles
            $permissionRoles = $permission->roles;

            // Check if the permission has all the specified roles
            $hasAllRoles = !array_diff($roles, $permissionRoles);

            // If the permission has all the specified roles, add it to the collection
            if ($hasAllRoles) {
                $permissionsWithRoles->push($permission);
            }
        }

        return $permissionsWithRoles;
    }
}



function processRoles($roles){

//this function will go throught the $roles->permissions array and check which permissions are assigned to the role

//then it will greought throught all the $permission->roles array and check with roles are assignt to the permission

//then it will match the $roles->permissions array with the $permission->roles array and if the role has the permission bit the permission donet have the role it will addight the role to the permission




    // Iterate through the roles
    foreach ($roles as $role) {
        $role = getRoleBy($role);

        // Iterate through the permissions assigned to the role
        foreach ($role->permissions as $permission) {

            $permission = getPermissionBy($permission);
            // Check if the permission has the current role
            
            if (!in_array($role->slug, $permission->roles)) {
                // Add the role to the permission
                $permission->roles[] = $role->slug;
            }
        }
    }

}