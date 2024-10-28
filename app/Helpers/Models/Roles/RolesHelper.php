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
     * @param string $permissionSlug The slug of the permission.
     * @return \Illuminate\Database\Eloquent\Collection A collection of roles that have the specified permission.
     */
    function getRolesByPermission($permissionSlug)
    {
        return Role::withPermission($permissionSlug);
    }
}

if (!function_exists('roleHasPermission')) {

    /**
     * Check if a role has a certain permission or permissions.
     *
     * This function checks whether a given role has the specified permission(s).
     * It first retrieves the role from the database using the provided role identifier.
     * If the role exists, it then checks if the specified permission(s) are associated with that role.
     *
     * @param string|int $roleIdentifier The identifier of the role to check (slug, ID, or name).
     * @param string|array $permissions The slug(s) of the permission(s) to check against.
     * @return bool|null True if the role has the specified permission(s), false otherwise. Returns null if the role does not exist.
     */
    function roleHasPermission($roleIdentifier, $permissions)
    {
        // Retrieve the role by its identifier
        $role = getRoleBy($roleIdentifier);

        // If the role does not exist, return null
        if (!$role) {
            return null;
        }

        // Check if the role has all the specified permissions
        return $role::hasPermission($role->slug, $permissions);
    }
}
if (!function_exists('getRolesByPermissions')) {

    /**
     * Get a list of roles that have certain permission or permissions.
     *
     * This function fetches roles from the database that are associated with the specified permission slugs.
     * It returns a collection of roles.
     *
     * @param mixed $permissions The slug or array of slugs of the permissions to check against.
     * @return \Illuminate\Database\Eloquent\Collection The collection of roles with the specified permissions.
     */
    function getRolesByPermissions($permissions)
    {     
        // Use the Role model's withPermissions method to fetch roles with the specified permissions
        return Role::withPermissions($permissions);
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
        return Role::withPermissions($permission)->first();
    }
}


if (!function_exists('hasRole')) {

    /**
     * Check if a person has a specific role or any of the given roles.
     *
     * This function verifies whether the provided person has the specified role(s).
     * It first retrieves the person object using the getPerson function.
     * If the person doesn't exist, it returns null.
     * For multiple roles (provided as an array), it checks if the person has any of those roles.
     * For a single role (provided as a string), it checks for an exact match.
     *
     * @param mixed $person The person to check. This can be any valid input for the getPerson function.
     * @param string|array $roles The role(s) to check against. Can be a single role as a string or multiple roles as an array.
     * @return bool|null Returns true if the person has the role(s), false if not, or null if the person doesn't exist.
     */
    function hasRole($person, $roles)
    {
        $person = getPerson(person:$person);
        // If there is no authenticated user or admin, return null
        if (!$person) {
            return null;
        }

        // Get the role slug of the user
        $personRole = $person->role;

        // If roles parameter is an array, check each role
        if (is_array($roles)) {
            foreach ($roles as $role) {
                // If any of the roles is found in the user's role, return true
                if ($personRole === $role) {
                    return true;
                }
            }
            // None of the roles matched, return false
            return false;
        }

        // If roles parameter is a string, check if it matches the user's role
        return $personRole === $roles;
    }
}
