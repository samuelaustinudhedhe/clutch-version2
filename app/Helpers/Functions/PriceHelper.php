<?php

if (!function_exists('humanizePrice')) {
    /**
     * Formats a price by adding a currency symbol and ensuring two decimal places.
     *
     * @param float|string|int $price The price to format. Can be a string with numbers and commas, an integer, or a float.
     * @param bool $echo Whether to echo the formatted price or return it.
     * @param int $decimals The number of decimal places to display. Default is 0.
     * @return string|null The formatted price with currency symbol, or null if the input is invalid.
     */
    function humanizePrice($price, int $decimals = 0, $currencyCode = null)
    {
        if (is_string($price)) {
            // Check if the string contains only digits and commas
            if (!preg_match('/^\d+(,\d{3})*(\.\d+)?$/', $price)) {
                \Log::error("Price format not supported. String price should contain only digits and commas. Received: " . print_r($price, true));
                return null;
            }
            $cleanPrice = str_replace(',', '', $price);
        } elseif (is_float($price) || is_int($price)) {
            $cleanPrice = $price;
        } else {
            \Log::error("Price format not supported. Price should be a string (numbers with ','), integer, or float. Received: " . print_r($price, true));
            return null;
        }

        $cleanPrice = number_format($cleanPrice, $decimals);
        $formattedPrice = app_currency_symbol($currencyCode) . $cleanPrice;


        return $formattedPrice;
    }
}

if (!function_exists('formatPrice')) {



    /**
     * Formats a price with currency symbol and specified decimal places.
     *
     * This function is an alias for the humanizePrice function. It takes a price value,
     * formats it with the specified number of decimal places, and adds a currency symbol.
     *
     * @param float|string|int $price The price to format. Can be a string with numbers and commas, an integer, or a float.
     * @param int $decimals The number of decimal places to display. Default is 0.
     * @param string|null $currencyCode The currency code to use for the symbol. If null, the default currency will be used.
     * @return string|null The formatted price with currency symbol, or null if the input is invalid.
     */
    function formatPrice($price, int $decimals = 0, $currencyCode = null)
    {
        return humanizePrice($price, $decimals, $currencyCode);
    }
}

if (!function_exists('countDays')) {

    /**
     * Converts a number of days into a human-readable string with appropriate pluralization.
     *
     * @param int|null $days The number of days to convert. If null, a default example string is returned.
     * @param bool $ly Whether to use a more general term like 'daily', 'weekly', or 'monthly' for specific day counts.
     * @return string A string representing the number of days with correct pluralization, or an example string if input is null.
     */
    function countDays($days, $ly = false)
    {
        if (is_null($days)) {
            return 'daily';
        }

        if ($days < 2) {
            return $ly ? 'daily' : $days . ' day';
        } elseif ($days <= 6) {
            return $days . ' days';
        } elseif ($days == 7) {
            return $ly ? 'weekly' : '1 week';
        } elseif ($days <= 13) {
            return '1 week and ' . ($days - 7) . ' day' . ($days - 7 > 1 ? 's' : '');
        } elseif ($days == 14) {
            return '2 weeks';
        } elseif ($days < 30) {
            $weeks = floor($days / 7);
            $remainingDays = $days % 7;
            return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ($remainingDays > 0 ? ' and ' . $remainingDays . ' day' . ($remainingDays > 1 ? 's' : '') : '');
        } elseif ($days == 30) {
            return $ly ? 'monthly' : '1 month';
        } else {
            $months = floor($days / 30);
            $remainingDays = $days % 30;
            return $months . ' month' . ($months > 1 ? 's' : '') . ($remainingDays > 0 ? ' and ' . $remainingDays . ' day' . ($remainingDays > 1 ? 's' : '') : '');
        }
    }
}
