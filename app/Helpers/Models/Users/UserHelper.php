<?php

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getUser')) {
    /**
     * Retrieves the currently authenticated user user or a specific attribute of the user.
     *
     * This function returns the currently authenticated user using the 'user' guard.
     * If an attribute is specified, it retrieves that attribute from the user user object.
     *
     * @param string|null $attribute The attribute to retrieve from the user user. If null, the entire user user object is returned.
     * @param \App\Models\User|null $user The user user object. If null, the currently authenticated user user is retrieved.
     * @return mixed The currently authenticated user user, a specific attribute of the user user, or null if the attribute does not exist.
     */
    function getUser($attribute = null, $user = null)
    {
        if (!$user || $user === 'current') {
            $user = Auth::user();
        }

        if ($attribute) {
            return $user->$attribute ?? null;
        }
        return $user;
    }
}

if (!function_exists('getUserMeta')) {

    /**
     * Retrieve the specified meta key value from the currently authenticated user.
     *
     * @param string $key The meta key to retrieve the value for.
     * @return mixed|null The value of the meta key if it exists, otherwise null.
     * 
     * Possible keys:
     * - 'first_name'
     * - 'last_name'
     * - 'email'
     * - 'date_of_birth'
     * - 'role'
     * - 'profile_picture'
     */
    function getUserMeta(string $key)
    {
        // Get the current user
        $user = getUser();

        // Return current user metadata
        return getMetaData($user, $key);
    }
}

/**
 * Retrieves the user's profile picture.
 *
 * @param bool $full Whether to return the full image including the <img> element and make room for a class. Default value is false.
 * @param string $class The class to be applied to the <img> element. Default value is an empty string.
 * @param bool $fallback Whether to use a fallback image if the profile picture is empty. Default value is false.
 * @param bool $echo Whether to echo the profile picture or return it as a string. Default value is false.
 * @return string|null The user's profile picture as a string or null if the user does not exist.
 */
function getUserPP($full = false, string $class = '', $fallback = true, bool $echo = false)
{
    // Get User Profile Picture (PP)
    $pp = getUser('profile_photo_url') ?? '';

    if ($full) {
        $echo = true;
        $pp = '<img src="' . $pp . '" alt="' . getUser('name') . '" class="' . $class . '">';
    }

    if ($fallback && empty($pp)) {
        // Use fallback image
        $pp = '<img src="fallback_image.jpg" alt="User Profile Picture Fallback Image" class="' . $class . '">';
    }

    if ($echo) {
        echo $pp;
    } else {
        return $pp;
    }
}

/**
 * Retrieves the user with a specific role.
 *
 * @param string $role The role to search for.
 * @return \App\Models\User|null The user with the specified role, or null if no user is found.
 */
function getUserByRole(string $role)
{
    // Retrieve the role based on the slug
    $role = getRoleBy($role);

    // If the role does not exist, return null
    if (!$role) {
        return null;
    }
    $users = User::search('role', $role->slug)->get();

    return $users;
}

/**
 * Retrieves users with specific roles.
 *
 * @param array|string $roles The roles to search for.
 * @return \Illuminate\Support\Collection The collection of users with the specified roles.
 */
function getUsersByRole($roles)
{
    // Ensure roles is an array
    if (!is_array($roles)) {
        $roles = [$roles];
    }

    // Get all users and admins
    $users = User::all();
    $admins = Admin::all();
    $users = $users->merge($admins);

    // Initialize a collection to store users with specified roles
    $usersWithRoles = collect();

    // Iterate through each user to check if they have one of the specified roles
    foreach ($users as $user) {
        $userRole = $user->role;

        // Check if the user has one of the roles
        if (in_array($userRole, $roles)) {
            $usersWithRoles->push($user);
        }
    }

    // Return the collection of users with roles
    return $usersWithRoles;
}

// /**
//  * Retrieves users with a specific role.
//  *
//  * @param string $role The role to search for.
//  * @return \Illuminate\Support\Collection The collection of users with the specified role.
//  */
// function getUsersByRole($role)
// {
//     // Verify if the role is valid
//     $role = getRoleBy($role);

//     // If the role does not exist, return an empty collection
//     if (!$role) {
//         return collect();
//     }

//     // Get all users and admins
//     $users = User::all();
//     $admins = Admin::all();
//     $users = $users->merge($admins);

//     // Initialize a collection to store users with the specified role
//     $usersWithRoles = collect();

//     // Iterate through each user to check if they have the specified role
//     foreach ($users as $user) {
//         $userRole = $user->role;

//         // Check if the user has the role
//         if ($userRole === $role->slug) {
//             $usersWithRoles->push($user);
//         }
//     }

//     // Return the collection of users with the role
//     return $usersWithRoles;
// }


/**
 * Retrieves users with all specified roles.
 *
 * @param array|string $roles The roles to search for.
 * @return \Illuminate\Support\Collection The collection of users with all the specified roles.
 */
function getUsersByRoles($roles)
{
    // Ensure roles is an array
    if (!is_array($roles)) {
        $roles = [$roles];
    }

    // Get all users and admins
    $users = User::all();
    $admins = Admin::all();
    $users = $users->merge($admins);

    // Initialize a collection to store users with specified roles
    $usersWithRoles = collect();

    // Iterate through each user to check if they have all the specified roles
    foreach ($users as $user) {
        $userRole = $user->role;

        // Check if the user has all the roles
        $hasAllRoles = !array_diff($roles, [$userRole]);

        if ($hasAllRoles) {
            $usersWithRoles->push($user);
        }
    }

    // Return the collection of users with roles
    return $usersWithRoles;
}

/**
 * Checks if a user has certain permission or permissions.
 *
 * @param \App\Models\User $user The user object.
 * @param mixed $permissions The permission or array of permissions to check.
 * @return bool|null Returns true if the user has the permission(s), false if not, and null if the user is not authenticated.
 */
function userHasPermission($user, $permissions)
{
    // If there is no authenticated user, return null
    if (!$user) {
        return null;
    }

    // Get the role slug of the user
    $roleSlug = $user->role;

    // Retrieve the role based on the slug
    $role = getRoleBy($roleSlug);

    // If the role does not exist, return false
    if (!$role) {
        return false;
    }

    // If permissions parameter is an array, check each permission
    if (is_array($permissions)) {
        foreach ($permissions as $permission) {
            // If any of the permissions is not found in the role's permissions, return false
            if (!in_array($permission, $role->permissions)) {
                return false;
            }
        }
        // All permissions are found, return true
        return true;
    }

    // If permissions parameter is a string, check if it exists in the role's permissions
    return in_array($permissions, $role->permissions);
}

if (!function_exists('hasPermissions')) {
    /**
     * Check if a user's role have a permission or permissions.
     *
     * @param mixed $permissions
     * @return bool
     */
    function hasPermissions($user, $permissions)
    {
        if (!$user) {
            return false;
        }

        $role = getRoleBy($user->role);

        if (roleHasPermission($role->slug, $permissions)) {
            return true;
        }

        return false;
    }
}



function getUsersByPermission($permissions)
{

    // Fetch roles that have the specified permission(s)
    $roles = getRoleWithPermissions($permissions);

    // Loop through each role and gather users
    foreach ($roles as $role) {
        $roleUsers = getUsersByRole($role->slug); // Get users by role slug
    }

    // Return an array of users with the specified permission(s)
    return $roleUsers;
}
// Add your code and comments here
