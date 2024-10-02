<?php

use Illuminate\Support\Facades\Storage;

function getUserStorage($disk = "public", $userId = null)
{
    if (!$userId) {
        $user = getUser(); // Assuming getUser() is a function that retrieves the current user
        $userId = $user->id; // Adjust the user ID calculation as needed
    }
    $path = $disk . "/users/{$userId}/";

    return $path;
}
