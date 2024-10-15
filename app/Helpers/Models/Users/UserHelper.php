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
     * @return mixed The currently authenticated user user, a specific attribute of the user user, or null if the attribute does not exist.
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


if (!function_exists('formatPhone')) {

    /**
     * Retrieves the user's phone number based on the specified type.
     *
     * @param mixed $phone The phone data, which can be an array or an object.
     * @param bool $code Whether to include the country code in the output. Default is true.
     * @param bool $format Whether to format the phone number. Default is false.
     * @param bool $echo Whether to echo the phone number or return it as a string. Default is false.
     * @param string $type The type of phone number to retrieve (e.g., 'work', 'home'). Default is 'work'.
     * @return string|null The formatted phone number as a string, or null if the phone number does not exist.
     */
    function formatPhone($phone, bool $code = true, bool $format = false, bool $echo = false, string $type = 'work')
    {
        // Check if the specified phone type exists
        if (is_array($phone)) {
            if (!isset($phone[$type])) {
                return null;
            }
            $phoneType = $phone[$type];
        } elseif (is_object($phone)) {
            if (!isset($phone->$type)) {
                return null;
            }
            $phoneType = $phone->$type;
        } else {
            return null;
        }

        // Get the country code
        $countryCode = is_array($phoneType) ? ($phoneType['country_code'] ?? '') : ($phoneType->country_code ?? '');
        $countryCode = str_replace('+', '', $countryCode);
        // Get the phone number
        $number = is_array($phoneType) ? ($phoneType['number'] ?? '') : ($phoneType->number ?? '');

        // Construct the output by combining the country code and phone number
        $output = (empty($countryCode)) ? $number : '+' . $countryCode . $number;

        // If formatting is requested, format the phone number
        if ($format) {
            switch (strlen($number)) {
                case 6:
                    $number = preg_replace('/(\d{3})(\d{3})/', '$1 $2', $number);
                    break;
                case 7:
                    $number = preg_replace('/(\d{3})(\d{4})/', '$1 $2', $number);
                    break;
                case 8:
                    $number = preg_replace('/(\d{3})(\d{2})(\d{3})/', '$1 $2 $3', $number);
                    break;
                case 9:
                    $number = preg_replace('/(\d{3})(\d{3})(\d{3})/', '$1 $2 $3', $number);
                    break;
                case 10:
                    $number = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1 $2 $3', $number);
                    break;
                case 11:
                    $number = preg_replace('/(\d{4})(\d{3})(\d{4})/', '$1 $2 $3', $number);
                    break;
                default:
                    // If the number length doesn't match any case, return it as is
                    break;
            }
            // Construct the output with formatted number
            $output = (empty($countryCode) || $code == false) ? $number : '+(' . $countryCode . ') ' . $number;
        }

        // If echo is requested, echo the output
        if ($echo) {
            echo $output;
        }

        // Return the output as a string
        return $output ?? null;
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

if (!function_exists('formatAddress')) {
    /**
     * Formats an address from an input array or stdClass object.
     *
     * @param array|stdClass $address The address data, which can be an array or an object.
     * @param string $format The format in which to return the address. Default is 'street, unit, city, state, country, postal_code'.
     * @param array $exclude The parts of the address to exclude (e.g., ['unit', 'country']). Default is an empty array.
     * @return string|null The formatted address, or null if the address data is empty.
     */
    function formatAddress($address, $format = 'street, unit, city, state, country, postal_code', $exclude = [])
    {
        // Check if the address data is empty
        if (empty($address)) {
            return null;
        }

        // Convert stdClass object to array if necessary
        if (is_object($address)) {
            $address = (array) $address;
        }

        // Remove excluded parts from the address
        foreach ($exclude as $part) {
            if (isset($address[$part])) {
                unset($address[$part]);
            }
        }

        // Split the format string into parts
        $formatParts = explode(', ', $format);

        // Format the address
        $formattedAddressParts = [];
        foreach ($formatParts as $part) {
            if (isset($address[$part])) {
                $formattedAddressParts[] = $address[$part];
            }
        }

        // Join the formatted address parts
        $formattedAddress = implode(', ', $formattedAddressParts);

        // Return the formatted address
        return $formattedAddress;
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
