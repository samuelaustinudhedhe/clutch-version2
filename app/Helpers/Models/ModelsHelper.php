<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

if (!function_exists('update')) {
    function update($table, $id, $data) {
        return DB::table($table)
            ->where('id', $id)
            ->update($data);
    }
}

if (!function_exists('updateUser')) {
    /**
     * Updates a user record in the database.
     *
     * @param int $id The ID of the user to be updated.
     * @param array $data An associative array of column-value pairs to update in the user record.
     * 
     * @return int The number of affected rows.
     */
    function updateUser($id, $data) {
        return update('users', $id, $data);
    }
}

if (!function_exists('updateVehicle')) {
    /**
     * Updates a vehicle record in the database.
     *
     * @param int $id The ID of the vehicle to be updated.
     * @param array $data An associative array of column-value pairs to update in the vehicle record.
     * 
     * @return int The number of affected rows.
     */
    function updateVehicle($id, $data) {
        return update('vehicles', $id, $data);
    }
}

if (!function_exists('updateAttachment')) {
    /**
     * Updates an attachment record in the database.
     *
     * @param int $id The ID of the attachment to be updated.
     * @param array $data An associative array of column-value pairs to update in the attachment record.
     * 
     * @return int The number of affected rows.
     */
    function updateAttachment($id, $data) {
        return update('attachments', $id, $data);
    }
}

if (!function_exists('updateTrip')) {
    /**
     * Updates a trip record in the database.
     *
     * @param int $id The ID of the trip to be updated.
     * @param array $data An associative array of column-value pairs to update in the trip record.
     * 
     * @return int The number of affected rows.
     */
    function updateTrip($id, $data) {
        return update('trips', $id, $data);
    }
}