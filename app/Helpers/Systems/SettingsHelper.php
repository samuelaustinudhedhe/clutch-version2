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
     | @param bool $echo Whether to echo the result or return it.
     | @return string The application URL.
     |
     */
    function app_url(bool $strip = true, bool $echo = true)
    {
        $setting = DB::table('settings')->where('key', 'app_url')->first();
        $data = $setting ? $setting->value : config('app.url');


        if ($strip === true) {
            //Strip the url of all but domain name or IP Address and Convert all characters to lowercase
            $data = preg_replace("#^[^:/.]|[:/]+#i", "", preg_replace("{/$}", "", urldecode(strtolower($data))));
        }

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
        $data = $setting ? $setting->value : asset('images/default-logo.png'); // Fallback to a default logo

        if ($echo) {
            echo "<img src='{$data}' alt='" . app_name(false) . "' height='34'>";
        } else {
            return $data;
        }
    }
}
