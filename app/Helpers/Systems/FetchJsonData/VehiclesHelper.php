<?php

if (!function_exists('vehicleTypes')) {
    /**
     * Fetch the list of vehicle types from a JSON file.
     *
     * @return array The list of vehicle types.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \RuntimeException If there is an error decoding the JSON data.
     */
    function vehicleTypes()
    {
        $path = "vehicle/types.json";
        return fetchJsonData($path);
    }
}

if (!function_exists('vehicleMakesAndModels')) {
    /**
     * Fetch the makes and models for a specific vehicle type from a JSON file.
     *
     * @param string $type The type of vehicle (e.g., 'car', 'motorcycle', 'truck').
     * @param bool|null $associative Whether to return the makes and models as an associative array (default: false).
     * 
     * @return array The list of makes and models for the specified vehicle type.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \RuntimeException If there is an error decoding the JSON data.
     */
    function vehicleMakesAndModels($type, $associative = null)
    {
        $path = "vehicle/makes-and-models/{$type}.json";
        return fetchJsonData($path, $associative);
    }
}

if (!function_exists('getCarsMakesAndModels')) {
    /**
     * Fetch the makes and models for cars.
     *
     * @return array The list of car makes and models.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \RuntimeException If there is an error decoding the JSON data.
     */
    function getCarsMakesAndModels()
    {
        return vehicleMakesAndModels('cars');
    }
}

if (!function_exists('getMotorcyclesMakesAndModels')) {
    /**
     * Fetch the makes and models for motorcycles.
     *
     * @return array The list of motorcycle makes and models.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \RuntimeException If there is an error decoding the JSON data.
     */
    function getMotorcyclesMakesAndModels()
    {
        return vehicleMakesAndModels('motorcycles');
    }
}

if (!function_exists('getTrucksMakesAndModels')) {
    /**
     * Fetch the makes and models for trucks.
     *
     * @return array The list of truck makes and models.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \RuntimeException If there is an error decoding the JSON data.
     */
    function getTrucksMakesAndModels()
    {
        return vehicleMakesAndModels('trucks');
    }
}