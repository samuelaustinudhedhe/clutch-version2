<?php

namespace App\Traits\Trips;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

/**
 * Trait TripData
 * This trait provides methods for managing trip data.
 */
trait TripData
{

    /**
     * Returns the path for storing trip data.
     *
     * @return string|null The path for storing trip data, or null if the user is not logged in.
     */
    public static function tripDataPath()
    {
        if (getUser()) {
            return getUserStorage('private') . "/data/trip.json";
        }

        return null;
    }

    /**
     * Stores the trip data in the specified path.
     *
     * @return void
     */
    public function storeTripData()
    {
        $data = $this->trip;
        $formattedData = [
            $this->vehicle->id => $data,
        ];
        $path = $this->tripDataPath();

        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($formattedData));
        }
    }

    /**
     * Stores the provided trip data in the specified path.
     *
     * @param array $data The trip data to be stored.
     * @return void
     */
    final static function putTripData($data)
    {
        $path = self::tripDataPath();

        if (!empty($path) && !empty($data)) {
            Storage::put($path, json_encode($data));
        }
    }

    /**
     * Retrieves the trip data from the specified path.
     *
     * @param bool $associative Whether to return the data as an associative array.
     * @return mixed|null The trip data, or null if the file does not exist or is empty.
     */
    public static function getTripData($associative = null)
    {
        $path = self::tripDataPath();

        if (!empty($path) && Storage::exists($path)) {
            return json_decode(Storage::get($path), $associative);
        }
        return null;
    }

    /**
     * Deletes the trip data for the specified vehicle.
     *
     * @param Vehicle $vehicle The vehicle for which the trip data should be deleted.
     * @return void
     */
    final static function deleteTripData(Vehicle $vehicle)
    {
        $data = self::getTripData(true);
        
        unset($data[$vehicle->id]);

        self::putTripData($data);
    }

    /**
     * Deletes the trip data for the current vehicle.
     *
     * @return void
     */
    final function deleteTripsData()
    {
        $path = $this->tripDataPath();

        // Check if the path is not empty and the file exists
        if (!empty($path) && Storage::exists($path)) {
            // Delete the file
            Storage::delete($path);
            // Reset the trip data
            $this->trip = [];
        }
    }
}