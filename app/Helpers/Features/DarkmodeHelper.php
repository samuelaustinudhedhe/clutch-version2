<?php

use App\Http\Controllers\Features\DarkModeController as DarkMode;



if (!function_exists('darkModeOn')) {

    /**
     * turn on the dark mode.
     *
     * @param  bool $echo
     * @return string
     */
    function darkModeOn(bool $echo = true): ?string
    {
        return app(DarkMode::class)->on($echo);
    }
}

if (!function_exists('darkModeSwitch')) {

    /**
     * Toggle the dark mode switch and optionally return or echo the result.
     *
     * @param bool $echo Whether to echo the switch result. Default is true.
     * @return string|null If $echo is true, returns null. Otherwise, returns the switch result as a string.
     */
    function darkModeSwitch(bool $echo = true): ?string
    {
        // Get the dark mode switch result
        $switch = app(DarkMode::class)->switch();

        // Echo the switch result if $echo is true
        if ($echo) {
            echo $switch;
            return null;
        }

        // Return the switch result if $echo is false
        return $switch;
    }
}

if (!function_exists('darkModeButton')) {

    /**
     * Toggle the dark mode button and optionally return or echo the result.
     *
     * @param bool $echo Whether to echo the button result. Default is true.
     * @return string|null If $echo is true, returns null. Otherwise, returns the button result as a string.
     */
    function darkModeButton(bool $echo = true): ?string
    {
        // Get the dark mode switch result
        $button = app(DarkMode::class)->button();

        // Echo the switch result if $echo is true
        if ($echo) {
            echo $button;
            return null;
        }

        // Return the switch result if $echo is false
        return $button;
    }
}

if (!function_exists('darkModeModal')) {

    /**
     * Toggle the dark mode Modal and optionally return or echo the result.
     *
     * @param bool $echo Whether to echo the modal popup result. Default is true.
     * @return string|null If $echo is true, returns null. Otherwise, returns the modal result as a string.
     */
    function darkModeModal(bool $echo = true): ?string
    {
        // Get the dark mode switch result
        $modal = app(DarkMode::class)->modal();

        // Echo the switch result if $echo is true
        if ($echo) {
            echo $modal;
            return null;
        }

        // Return the switch result if $echo is false
        return $modal;
    }
}

