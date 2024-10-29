<?php

use App\Models\Admin;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Attachment;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (!function_exists('update')) {
    function update($table, $id, $data)
    {
        if (!Schema::hasTable($table)) {
            throw new InvalidArgumentException("Table '{$table}' does not exist.");
        }

        return DB::table($table)
            ->where('id', $id)
            ->update($data);
    }
}

if (!function_exists('updateUser')) {
    /**
     * Updates a user record in the database.
     *
     * @param User|int $user The User model instance or the ID of the user to be updated.
     * @param array $data An associative array of column-value pairs to update in the user record.
     * 
     * @return int The number of affected rows.
     */
    function updateUser($user, array $data)
    {
        $userId = $user instanceof User ? $user->id : $user;

        if (!is_int($userId)) {
            throw new InvalidArgumentException('The user parameter must be either a User model instance or an integer ID.');
        }

        return update('users', $userId, $data);
    }
}

if (!function_exists('updateAdmin')) {
    /**
     * Updates a admin record in the database.
     *
     * @param Admin|int $admin The admin model instance or the ID of the admin to be updated.
     * @param array $data An associative array of column-value pairs to update in the admin record.
     * 
     * @return int The number of affected rows.
     */
    function updateAdmin($admin, array $data)
    {
        $adminId = $admin instanceof Admin ? $admin->id : $admin;

        if (!is_int($adminId)) {
            throw new InvalidArgumentException('The admin parameter must be either a Admin model instance or an integer ID.');
        }

        return update('admins', $adminId, $data);
    }
}

if (!function_exists('updateVehicle')) {
    /**
     * Updates a vehicle record in the database.
     *
     * @param Vehicle|int $vehicle The Vehicle model instance or the ID of the vehicle to be updated.
     * @param array $data An associative array of column-value pairs to update in the vehicle record.
     * 
     * @return int The number of affected rows.
     */
    function updateVehicle($vehicle, array $data)
    {
        $vehicleId = $vehicle instanceof Vehicle ? $vehicle->id : $vehicle;

        if (!is_int($vehicleId)) {
            throw new InvalidArgumentException('The vehicle parameter must be either a Vehicle model instance or an integer ID.');
        }

        return update('vehicles', $vehicleId, $data);
    }
}

if (!function_exists('updateAttachment')) {
    /**
     * Updates an attachment record in the database.
     *
     * @param Attachment|int $attachment The Attachment model instance or the ID of the attachment to be updated.
     * @param array $data An associative array of column-value pairs to update in the attachment record.
     * 
     * @return int The number of affected rows.
     */
    function updateAttachment($attachment, array $data)
    {
        $attachmentId = $attachment instanceof Attachment ? $attachment->id : $attachment;

        if (!is_int($attachmentId)) {
            throw new InvalidArgumentException('The attachment parameter must be either an Attachment model instance or an integer ID.');
        }

        return update('attachments', $attachmentId, $data);
    }
}

if (!function_exists('updateTrip')) {
    /**
     * Updates a trip record in the database.
     *
     * @param Trip|int $trip The Trip model instance or the ID of the trip to be updated.
     * @param array $data An associative array of column-value pairs to update in the trip record.
     * 
     * @return int The number of affected rows.
     */
    function updateTrip($trip, array $data)
    {
        $tripId = $trip instanceof Trip ? $trip->id : $trip;

        if (!is_int($tripId)) {
            throw new InvalidArgumentException('The trip parameter must be either a Trip model instance or an integer ID.');
        }

        return update('trips', $tripId, $data);
    }
}

if (!function_exists('getPerson')) {
    /**
     * Retrieves a person record, prioritizing admin over user.
     *
     * This function attempts to fetch an admin record first. If no admin is found,
     * it then tries to fetch a user record. This prioritization allows for a 
     * hierarchical approach to person retrieval in the system.
     *
     * @param string $attribute The attribute to search by (e.g., 'id', 'email', 'username').
     *                          If left empty, it will use the default identifier for getAdmin and getUser functions.
     * @param mixed $person The person identifier to search for. 
     *                      This could be an ID, email, username, or any other unique identifier.
     * 
     * @return mixed|\App\Models\Admin|\App\Models\User|null The admin or user record if found, otherwise null.
     *         Returns an Admin model instance if an admin is found,
     *         a User model instance if a user is found and no admin was found,
     *         or null if neither an admin nor a user was found.
     *
     * @uses getAdmin() Attempts to retrieve an admin record.
     * @uses getUser() Attempts to retrieve a user record if no admin was found.
     *
     * @example
     * // Fetch a person by email
     * $person = getPerson('email', 'example@email.com');
     *
     * // Fetch a person by ID
     * $person = getPerson('id', 5);
     *
     * // Fetch a person using default identifier
     * $person = getPerson();
     */
    function getPerson($attribute = '', $person = null)
    {
        // Get the Admin
        $person = getAdmin($person, $attribute) ?? getUser($attribute, $person);
        // Add the 'who' attribute to the person
        return $person;
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

if (!function_exists('isLoggedIn')) {
    /**
     * Check if the Person is currently logged in.
     *
     * @param string $guard The guard to check. Default is null (checks both user and admin guards).
     * @return bool Returns true if the person is logged in, false otherwise.
     */
    function isLoggedIn($guard = null)
    {
        if ($guard === 'admin') {
            return auth('admin')->check();
        } elseif ($guard === 'web') {
            return auth()->check();
        } else {
            // If no specific guard is provided, check both
            return auth()->check() || auth('admin')->check();
        }
    }
}

if (!function_exists('isJson')) {
    /**
     * Checks if a given string is a valid JSON.
     *
     * This function attempts to decode the input string as JSON and checks
     * if the operation was successful.
     *
     * @param string $string The string to be checked for JSON validity.
     *
     * @return bool Returns true if the string is valid JSON, false otherwise.
     */
    function isJson($string): bool
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
