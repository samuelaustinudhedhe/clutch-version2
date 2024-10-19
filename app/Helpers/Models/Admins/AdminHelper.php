<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

/**
 * Sets the authentication guard to 'admin' and returns the guard instance.
 *
 * This function sets the authentication guard to 'admin' using Laravel's Auth facade
 * and returns the guard instance. It is typically used to specify that the following
 * authentication operations should be performed using the 'admin' guard.
 *
 * @return \Illuminate\Contracts\Auth\Guard The guard instance for the 'admin' guard.
 */
function guardAdmin()
{
    return Auth::guard('admin');
}

if (!function_exists('getAdmin')) {
    /**
     * Retrieves the currently authenticated admin user or a specific attribute of the admin.
     *
     * This function returns the currently authenticated admin using the 'admin' guard.
     * If an attribute is specified, it retrieves that attribute from the admin user object.
     *
     * @param \App\Models\Admin|null $admin The admin user object. If null, the currently authenticated admin user is retrieved.
     * @param string|null $attribute The attribute to retrieve from the admin user. If null, the entire admin user object is returned.
     * @return mixed The currently authenticated admin user, a specific attribute of the admin user, or null if the attribute does not exist.
     */
    function getAdmin($admin = null, $attribute = null)
    {
        if (is_numeric($admin)) {
            // If $admin is a numeric ID, retrieve the admin by ID
            $admin = Admin::find($admin);
        } elseif ((!$admin || !is_object($admin)) || $admin === 'current') {
            // If $admin is null or 'current', get the currently authenticated admin
            $admin = Auth::guard('admin')->user();
        }
    
        if ($attribute) {
            return $admin->$attribute ?? null;
        }
        return $admin ?? null;
    }
}