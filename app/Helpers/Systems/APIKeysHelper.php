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
    return 'AIzaSyDHrouXMU1tozzlEpqq5IYFT1fEczaYFMk';
}


/**
 * Retrieves PayStack API keys.
 *
 * @param bool $test Specifies whether to fetch test API keys. Defaults to false (fetches live keys).
 *
 * @return array Returns an array containing PayStack API keys (secret_key and public_key).
 */
function payStackKeys($test = false)
{
    // API Configuration - Test Mode
    $testApiKey = [
        'secret_key' => 'sk_test_ab81c176e77848d5c91ae0504b287ebc00dc61f7',
        'public_key' => 'pk_test_06c43f28737153732513617505ce2384adaf7264'
    ];

    // API Configuration - Live Mode
    $liveApiKey = [
        'secret_key' => 'sk_live_cded7ba8bee607fe15a749bf683cdae0eaffc3b7',
        'public_key' => 'pk_live_5e8e00e9e218ecc0189158acfb0b151da6118acf'
    ];

    // Return keys based on mode
    return $test ? $testApiKey : $liveApiKey;
}
