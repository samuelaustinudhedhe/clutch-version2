<?php

use Illuminate\Support\Facades\File;


if (! function_exists('resource_json_path')) {
    /**
     * Get the path to the resources json folder.
     *
     * @param  string  $path
     * @return string
     */
    function resource_json_path($path = '')
    {
        return app()->resourcePath("json/{$path}");
    }
}

if (!function_exists('fetchJsonData')) {
    /**
     * Fetches and decodes JSON data from a specified file.
     *
     * This function reads a JSON file from a given path, decodes its contents,
     * and returns the resulting data. It handles both full resource paths and
     * relative paths within the json resource directory.
     *
     * @param string|null $path The path to the JSON file. Can be a full resource path
     *                          or a relative path within the json resource directory.
     *                          If null, an InvalidArgumentException is thrown.
     * @param bool $associative Whether to return objects as associative arrays.
     *                          Default is true.
     *
     * @return mixed The decoded JSON data. If $associative is true, returns an
     *               associative array, otherwise returns an object.
     *
     * @throws \InvalidArgumentException If the path is null.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the file doesn't exist.
     * @throws \RuntimeException If there's an error decoding the JSON.
     */
    function fetchJsonData($path = null, $associative = true)
    {
        if ($path === null) {
            throw new \InvalidArgumentException('Path cannot be null');
        }

        // Check if the path is a full resource path or a relative path
        if (strpos($path, resource_path()) === 0) {
            $fullPath = $path;
        } else {
            // Remove 'json/' from the beginning of the path if it exists
            $relativePath = (strpos($path, 'json/') === 0) ? substr($path, 5) : $path;
            $fullPath = resource_json_path($relativePath);
        }

        // Check if the file exists
        if (!File::exists($fullPath)) {
            throw new \Illuminate\Contracts\Filesystem\FileNotFoundException("File not found: $fullPath");
        }
        // Get the content of the JSON file
        $json = File::get($fullPath);

        // Decode the JSON data
        $data = json_decode($json, $associative);

        // Handle decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Error decoding JSON: ' . json_last_error_msg());
        }

        // Return the data
        return $data;
    }
}
