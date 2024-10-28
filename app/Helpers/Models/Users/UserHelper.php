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
     * @param \App\Models\User|null|int $user The user user object. If null, the currently authenticated user user is retrieved.
     * @return \App\Models\User|string|array|object|null The currently authenticated user user, a specific attribute of the user user, or null if the attribute does not exist.
     */
    function getUser($attribute = null, $user = null)
    {
        if (is_numeric($user)) {
            // If $user is a numeric ID, retrieve the user by ID
            $user = User::find($user);
        } elseif (!$user || $user === 'current') {
            // If $user is null or 'current', get the currently authenticated user
            $user = Auth::user();
        }

        if ($attribute) {
            return $user->$attribute ?? null;
        }
        return $user ?? null;
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
        return getMetaData($user, $key) ?? null;
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

if (!function_exists('getUserPhone')) {

    /**
     * Retrieves the user's phone number based on the specified type.
     *
     * @param bool $code Whether to include the country code in the output. Default is true.
     * @param bool $format Whether to format the phone number. Default is false.
     * @param bool $echo Whether to echo the phone number or return it as a string. Default is false.
     * @param string $type The type of phone number to retrieve (e.g., 'work', 'home'). Default is 'work'.
     * @return string|null The formatted phone number as a string, or null if the phone number does not exist.
     */
    function getUserPhone(bool $code = true, bool $format = false, bool $echo = false, string $type = 'work')
    {
        // Get the user's phone metadata
        $phone = getUserMeta('phone');

        return formatPhone($phone, $code, $format, $echo, $type);
    }
}

if (!function_exists('getUserAddress')) {
    /**
     * Retrieves the full address of the currently authenticated user.
     *
     * @param string $type The type of address to retrieve (e.g., 'home', 'work'). Default is 'home'.
     * @param string $format The format in which to return the address. Default is '{street}, {unit}, {city}, {state}, {country}, {postal_code}'.
     * @param array $exclude The parts of the address to exclude (e.g., ['unit', 'country']). Default is an empty array.
     * @return string|null The formatted full address of the user, or null if the address details are not available.
     */
    function getUserAddress($type = 'home', $format = 'unit, street, city, state, country, postal_code', $exclude = [])
    {
        // Get the user's address metadata
        $address = getUserMeta('address');

        // Check if the address details exist for the specified type
        if (!isset($address->$type)) {
            return null;
        }

        // Construct the full address
        $addressDetails = $address->$type;
        $addressParts = [
            'street' => $addressDetails->street ?? '',
            'unit' => $addressDetails->unit ?? '',
            'city' => $addressDetails->city ?? '',
            'state' => $addressDetails->state ?? '',
            'country' => $addressDetails->country ?? '',
            'postal_code' => $addressDetails->postal_code ?? '',
        ];

        // Remove excluded parts from the address
        foreach ($exclude as $part) {
            $placeholder = '{' . $part . '}';
            if (isset($addressParts[$placeholder])) {
                unset($addressParts[$placeholder]);
            }
        }

        // Format the address
        $fullAddress = str_replace(array_keys($addressParts), array_values($addressParts), $format);

        // Return the formatted full address
        return $fullAddress;
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
    $users = User::where('role', $role->slug)->get();

    return $users ?? null;
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

if (!function_exists('getUsersByRoles')) {
    /**
     * Retrieves users with all specified roles.
     *
     * @param array|string $roles The role(s) to search for.
     * @return \Illuminate\Support\Collection The collection of users with all the specified roles.
     */
    function getUsersByRoles($roles)
    {
        // Ensure roles is an array
        $roles = (array) $roles;

        // Get all users (including admins)
        $users = User::all();

        // Filter users who have all the specified roles
        return $users->filter(function ($user) use ($roles) {
            // Get the user's roles as an array
            $userRoles = is_array($user->role) ? $user->role : [$user->role];
            
            // Check if the user has all the specified roles
            return empty(array_diff($roles, $userRoles));
        });
    }
}

if (!function_exists('userHasPermission')) {
    /**
     * Checks if the authenticated user has certain permission or permissions.
     *
     * @param string|array $permissions The permission or array of permissions to check.
     * @return bool|null Returns true if the user has the permission(s), false if not, and null if no user is authenticated.
     */
    function userHasPermission($permissions)
    {
        $user = getUser();

        // If there is no authenticated user, return null
        if (!$user) {
            return null;
        }
        return $user->hasPermission($permissions);
    }
}

if (!function_exists('getUsersByPermission')) {

    /**
     * Retrieves users who have the specified permission(s) based on their roles.
     *
     * This function fetches roles that have the given permission(s) and then
     * retrieves users associated with those roles.
     *
     * @param string|array $permissions A single permission string or an array of permission strings to check.
     * @return array An array of user objects who have the specified permission(s) through their roles.
     */
    function getUsersByPermission($permissions)
    {

        // Fetch roles that have the specified permission(s)
        $roles = getRolesByPermissions($permissions);

        // Loop through each role and gather users
        foreach ($roles as $role) {
            $roleUsers = getUsersByRole($role->slug); // Get users by role slug
        }

        // Return an array of users with the specified permission(s)
        return $roleUsers;
    }
    // Add your code and comments here
}
