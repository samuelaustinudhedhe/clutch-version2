<?php

use App\Models\User;
use Illuminate\Support\Facades\Storage;

function getUserStorage($disk = "public", $userId = null)
{
    if ($userId) {
        // Check if the provided user ID is valid
        $user = User::find($userId);
        if (!$user) {
            throw new Exception("Invalid user ID: {$userId}");
        }
    } else {
        // Retrieve the current user if no user ID is provided
        $user = getUser(); // Assuming getUser() is a function that retrieves the current user
        if (!$user) {
            throw new Exception("No valid user found.");
        }
        $userId = $user->id;
    }

    $path = $disk . "/users/{$userId}/";
    return $path;
}