<?php

// app/Helpers/Metadata/MetadataHelper.php
use Illuminate\Support\Facades\DB;

if (!function_exists('getMetaData')) {
    /*
     | Retrieve the specified meta key value from the given object.
     |
     | This function checks if the object is provided and then attempts
     | to retrieve the value associated with the specified meta key. If the
     | key does not exist or the object is null, it returns null.
     |
     | @param object|null $object The object containing metadata or null if not available.
     | @param string $key The meta key to retrieve the value for.
     | @return mixed|null The value of the meta key if it exists, otherwise null.
     |
     */
    function getMetaData(?object $object, string $key)
    {
        // If the object is null or the property doesn't exist, return null
        if ($object !== null && isset($object->$key)) {
            // Return the value of the specified meta key
            return $object->$key;
        }

        // If the object is not authenticated or the key does not exist, return null
        return null;
    }
}

if (!function_exists('setMetaData')) {
    /*
     | Set or update metadata for an object.
     |
     | This function assigns the provided value to the specified meta key
     | on the given object.
     |
     | @param object $object The object containing metadata.
     | @param string $key The meta key to set or update.
     | @param mixed $value The value to assign to the meta key.
     |
     */
    function setMetaData(object $object, string $key, $value)
    {
        $object->$key = $value;
    }
}

if (!function_exists('hasMetaData')) {
    /*
     | Check if a specific metadata key exists for an object.
     |
     | This function queries the database to check if a metadata record exists for the given object and key.
     |
     | @param string $object The class name of the model.
     | @param mixed $identifier The identifier of the object (e.g., user ID, admin ID).
     | @param string $key The metadata key.
     | @return bool True if the metadata key exists, false otherwise.
     |
     */
    function hasMetaData(string $object, $identifier, string $key): bool
    {
        // Check if the provided class name is a valid Eloquent model
        if (!class_exists($object) * !is_subclass_of($object, 'Illuminate\Database\Eloquent\Model')) {
            return false; // Return false if the provided class name is invalid
        }

        // Check if the object with the provided identifier exists
        $object = $object::find($identifier);
        if (!$object) {
            return false; // Return false if the object does not exist
        }

        // Determine the table name for metadata
        $tableName = 'users'; // Assuming metadata table name follows convention

        // Check if the metadata table exists in the database
        if (!DB::getSchemaBuilder()->hasTable($tableName)) {
            return false; // Return false if the metadata table does not exist
        }

        // Check if the metadata record exists for the object and key
        $existingRecord = DB::table($tableName)
            ->where($identifier)
            ->where($key)
            ->exists();

        return $existingRecord;
    }
}

if (!function_exists('deleteMetaData')) {
    /*
     | Delete metadata associated with a specific key from an object.
     |
     | This function removes the specified meta key from the given object.
     |
     | @param object $object The object containing metadata.
     | @param string $key The meta key to delete.
     |
     */
    function deleteMetaData(object $object, string $key)
    {
        unset($object->$key);
    }
}

if (!function_exists('getAllMetaData')) {
    /*
     | Retrieve all metadata associated with an object.
     |
     | This function converts the given object's metadata into an associative array
     | and returns it.
     |
     | @param object $object The object containing metadata.
     | @return array An associative array of all metadata.
     |
     */
    function getAllMetaData(object $object): array
    {
        return (array) $object;
    }
}

if (!function_exists('filterMetaData')) {
    /*
     | Filter metadata based on certain criteria.
     |
     | This function filters the given object's metadata using a provided callback function.
     |
     | @param object $object The object containing metadata.
     | @param callable $callback A callback function to filter the metadata.
     | @return array An associative array of filtered metadata.
     |
     */
    function filterMetaData(object $object, callable $callback): array
    {
        return array_filter((array) $object, $callback, ARRAY_FILTER_USE_BOTH);
    }
}

if (!function_exists('countMetaData')) {
    /*
     | Count the number of metadata entries associated with an object.
     |
     | This function counts the total number of metadata entries on the given object.
     |
     | @param object $object The object containing metadata.
     | @return int The number of metadata entries.
     |
     */
    function countMetaData(object $object): int
    {
        return count((array) $object);
    }
}
