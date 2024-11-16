<?php

/**
 * Retrieves the Google Maps API key.
 *
 * This function returns a hardcoded Google Maps API key for use in the application.
 *
 * @return string The Google Maps API key.
 */
function getGoogleMapKey()
{
    return config('services.google.map');
}


/**
 * Retrieves PayStack API keys.
 *
 * @param bool $test Specifies whether to fetch test API keys. Defaults to false (fetches live keys).
 * @param string|null $keyType Specifies which key to return ('secret' or 'public'). If null, returns both keys.
 *
 * @return string|array Returns a string if $keyType is specified, otherwise returns an array containing PayStack API keys.
 */
function getPayStackKeys($keyType = null, $test = null)
{
    // Set test mode based on environment variable
    if ($test === null) {
        $test = env('APP_DEBUG', true);
    }

    // API Configuration - Test Mode
    $testApiKey = [
        'secret_key' => config('services.paystack.test.secret_key'),
        'public_key' => config('services.paystack.test.public_key')
    ];

    // API Configuration - Live Mode
    $liveApiKey = [
        'secret_key' => config('services.paystack.live.secret_key'),
        'public_key' => config('services.paystack.live.public_key')
    ];

    // Select keys based on mode
    $keys = $test ? $testApiKey : $liveApiKey;

    // Return specific key if keyType is provided
    if ($keyType !== null) {
        $key = $keyType . '_key';
        return $keys[$key] ?? null;
    }

    // Return all keys if keyType is not provided
    return $keys;
}
