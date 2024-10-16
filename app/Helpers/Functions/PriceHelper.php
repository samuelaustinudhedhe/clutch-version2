<?php


if (!function_exists('humanifyPrice')) {
    /**
     * Formats a price by adding a currency symbol and ensuring two decimal places.
     *
     * @param string|float $price The price to format. Can be a string with numbers and commas or a float.
     * @param bool $echo Whether to echo the formatted price or return it.
     * @return string|null The formatted price with currency symbol, or null if the input is invalid.
     */
    function humanifyPrice($price, $echo = false)
    {
        if (is_string($price)) {
            // Check if the string contains only digits and commas
            if (!preg_match('/^\d+(,\d{3})*(\.\d+)?$/', $price)) {
                \Log::error("Price format not supported. String price should contain only digits and commas. Received: " . print_r($price, true));
                return null;
            }
            $cleanPrice = str_replace(',', '', $price);
        } elseif (is_float($price)) {
            $cleanPrice = $price;
        } else {
            \Log::error("Price format not supported. Price should be a string (numbers with ',') or float. Received: " . print_r($price, true));
            return null;
        }

        $cleanPrice = number_format($cleanPrice, 2, '.', ',');
        $formattedPrice = app_currency_symbol(false) . $cleanPrice;

        if ($echo) {
            echo $formattedPrice;
        } else {
            return $formattedPrice;
        }
    }
}

if (!function_exists('formatPrice')) {

    /**
     * Formats a price by utilizing the humanifyPrice function.
     *
     * @param string|float $price The price to format. Can be a string with numbers and commas or a float.
     * @param bool $echo Whether to echo the formatted price or return it.
     * @return string|null The formatted price with currency symbol, or null if the input is invalid.
     */
    function formatPrice($price, $echo = false)
    {
        return humanifyPrice($price, $echo);
    }
}

if (!function_exists('countDays')) {

    /**
     * Converts a number of days into a human-readable string with appropriate pluralization.
     *
     * @param int|null $days The number of days to convert. If null, a default example string is returned.
     * @return string A string representing the number of days with correct pluralization, or an example string if input is null.
     */
    function countDays($days)
    {
        if (is_null($days)) {
            return 'eg. 1 day';
        }

        if ($days < 2) {
            return $days . ' day';
        } elseif ($days <= 6) {
            return $days . ' days';
        } elseif ($days <= 13) {
            return floor($days / 7) . ' week' . ($days >= 14 ? 's' : '');
        } elseif ($days == 14) {
            return '2 weeks';
        } else {
            return $days . ' days';
        }
    }
}
