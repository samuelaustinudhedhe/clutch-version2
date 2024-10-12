<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

function getAdminStorage($disk = "public", $adminId = null)
{
    if ($adminId) {
        // Check if the provided admin ID is valid
        $admin = Admin::find($adminId);
        if (!$admin) {
            throw new Exception("Invalid admin ID: {$adminId}");
        }
    } else {
        // Retrieve the current admin if no admin ID is provided
        $admin = getadmin(); // Assuming getadmin() is a function that retrieves the current admin
        if (!$admin) {
            throw new Exception("No valid admin found.");
        }
        $adminId = $admin->id;
    }

    $path = $disk . "/admins/{$adminId}/";
    return $path;
}