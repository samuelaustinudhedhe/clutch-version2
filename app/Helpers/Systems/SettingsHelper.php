<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('app_name')) {
    /*
     | Get the application name.
     |
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application name.
     |
     */
    function app_name(bool $echo = true)
    {
        $setting = DB::table('settings')->where('key', 'app_name')->first();
        $data = $setting ? $setting->value : config('app.name', 'Clutch');

        if ($echo) {
            echo $data;
        } else {
            return $data;
        }
    }
}

if (!function_exists('app_tagline')) {
    /*
     | Get the application tagline from the settings table.
     |
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application tagline.
     |
     */
    function app_tagline(bool $echo = true)
    {
        $setting = DB::table('settings')->where('key', 'app_tagline')->first();
        $data = $setting ? $setting->value : config('app.tagline', 'Get Wheels with Ease');

        if ($echo) {
            echo $data;
        } else {
            return $data;
        }
    }
}

if (!function_exists('app_url')) {
    /*
     | Get the application URL from the settings table.
     |
     | @param string $path The path to append to the base URL.
     | @param bool $strip Whether to strip the URL to its domain.
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application URL.
     |
     */
    function app_url(string $path = '', bool $strip = false, bool $echo = true)
    {
        $setting = DB::table('settings')->where('key', 'app_url')->first();
        $data = $setting ? $setting->value : config('app.url');

        // Ensure the path starts with a slash
        if ($path && $path[0] !== '/') {
            $path = '/' . $path;
        }

        // Replace dots with slashes in the path
        $path = str_replace('.', '/', $path);

        if ($strip === true) {
            // Strip the URL of all but the domain name or IP Address and convert all characters to lowercase
            $data = preg_replace("#^https?://#i", "", urldecode(strtolower($data)));
        }

        $data .= $path;

        if ($echo) {
            echo $data;
        } else {
            return $data;
        }
    }
}

if (!function_exists('app_admin_slug')) {
    /*
     | Get the application Admin URL from the settings table.
     |
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application URL.
     |
     */
    function app_admin_slug(bool $echo = false)
    {
        $setting = DB::table('settings')->where('key', 'app_admin_slug')->first();
        $data = $setting ? $setting->value : config('app.admin.slug', 'admin');

        if ($echo) {
            echo $data;
        } else {
            return $data;
        }
    }
}

function app_admin_url()
{
    return 'auth';
}




if (!function_exists('app_logo')) {
    /*
     | Get the application logo URL from the settings table.
     |
     | @param bool $echo Whether to echo the image tag or return the logo URL.
     | @return string The application logo URL or an empty string if echoed.
     |
     */
    function app_logo(bool $echo = false)
    {
        $setting = DB::table('settings')->where('key', 'app_logo')->first();
        $data = $setting ? $setting->value : '/assets/images/logos/clutch.png'; // Fallback to a default logo

        if ($echo) {
            echo "<img src='{$data}' alt='" . app_name(false) . "' height='34'>";
        } else {
            return $data;
        }
    }
}


if (!function_exists('app_currency')) {
    /*
     | Get the application currency from the settings table.
     |
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application currency.
     |
     */
    function app_currency(bool $echo = true)
    {
        $setting = DB::table('settings')->where('key', 'app_currency')->first();
        $data = $setting ? $setting->value : config('app.currency', 'NGN');

        if ($echo) {
            echo $data;
        } else {
            return $data;
        }
    }
}


if (!function_exists('app_currency_symbol')) {
    /*
     | Get the application currency symbol from a JSON file.
     |
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application currency symbol.
     |
     */
    function app_currency_symbol($currencyCode = null)
    {
        if ($currencyCode === null) {
            $currencyCode = app_currency(false); // Get the default currency code if not provided
        }

        $countries = countries();
        $symbol = $currencyCode; // Default to currency code if symbol is not found

        foreach ($countries as $country) {
            if (isset($country['currencies'][$currencyCode])) {
                $symbol = $country['currencies'][$currencyCode]['symbol'] ?? $currencyCode;
                break;
            }
        }
        return $symbol;
    }
}
