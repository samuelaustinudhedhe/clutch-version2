<?php

use Illuminate\Support\Facades\File;

/**
 * Fetches the list of countries from a JSON file and returns it as an array.
 *
 * @return array The list of countries.
 *
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
 * @throws \Exception If there is an error decoding the JSON data.
 */
function fetchJsonData($path = null, $associative = true)
{
    // Check if the file exists
    if (!File::exists($path)) {
        // Handle the error, maybe throw an exception or return an error response
        abort(404, 'File not found');
    }

    // Get the content of the JSON file
    $json = File::get($path);

    // Decode the JSON data into an array
    $countries = json_decode($json, $associative);

    // Handle decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Handle the error, maybe throw an exception or return an error response
        abort(500, 'Error decoding JSON');
    }

    // Return or use the data as needed
    return $countries;
}

if (!function_exists('countries')) {
    /**
     * Fetches the list of countries from a JSON file and returns it as an array.
     *
     * @return array The list of countries.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \Exception If there is an error decoding the JSON data.
     */
    function countries()
    {
        $path = resource_path('json/countries.json');
        return fetchJsonData($path);
    }
}

if (!function_exists('vehicleTypes')) {
    /**
     * Fetches the list of countries from a JSON file and returns it as an array.
     *
     * @return array The list of countries.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \Exception If there is an error decoding the JSON data.
     */
    function vehicleTypes()
    {
        $path = resource_path('json/vehicle/types.json');
        return fetchJsonData($path);
    }
}
