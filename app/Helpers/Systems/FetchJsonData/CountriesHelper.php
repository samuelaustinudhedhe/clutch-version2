<?php

/**
 * CountriesHelper.php
 *
 * This file contains helper functions for fetching and sorting country data from a JSON file.
 * It provides functionality to retrieve a sorted list of countries and access the raw country data.
 *
 * @author Pilot-SAU
 * @version 1.0.0
 * @package App\Helpers\Systems\FetchJsonData
 */

if (!function_exists('getSortedCountries')) {
    /**
     * Retrieves a sorted list of countries from the JSON file.
     *
     * @return array The sorted list of countries. Each country is represented as an associative array.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException If the JSON file is not found.
     * @throws \Exception If there is an error decoding the JSON data.
     */
    function getSortedCountries()
    {
        $countries = countries();

        // Sort the countries by their common name
        usort($countries, function ($a, $b) {
            return strcmp($a['name']['common'], $b['name']['common']);
        });

        return $countries;
    }
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
        $path = 'countries.json';
        return fetchJsonData($path);
    }
}
