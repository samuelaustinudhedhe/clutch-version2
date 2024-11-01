<?php

use App\Http\Middleware\RedirectToIntendedRoute;

if (!function_exists('set_intended_url')) {
    /**
     * Sets the intended URL for future redirection.
     *
     * This function stores the provided URL using the RedirectToIntendedRoute middleware,
     * which can be used later for redirection purposes.
     *
     * @param string $url The URL to be set as the intended destination.
     * @param string|array|callable|null $conditions The condition(s) for redirection. Can be a string, an array of strings or callables, or a single callable.
     *  Available conditions:
     *   - onboarding_start: User is logged in and has started onboarding
     *   - onboarding_skipped: User is logged in and has skipped onboarding
     *   - onboarding_completed: User is logged in and has completed onboarding
     *   - is_admin: User is logged in and has admin privileges
     *   - is_user: User is logged in and is a regular user
     *   - is_logged_in: User is logged in
     *   - is_not_logged_in: User is not logged in
     * @param int $validity An optional validity period for the intended URL in minutes.
     * @return void
     */
    function set_intended_url($url, $condition = null, int $validity = 10)
    {
        RedirectToIntendedRoute::setIntended($url, $condition, $validity);
    }
}

if (!function_exists('set_intended_route')) {
    /**
     * Sets the intended route for future redirection.
     *
     * This function generates a URL from the given route name and parameters,
     * then stores it using the RedirectToIntendedRoute middleware for later use in redirection.
     *
     * @param string $name The name of the route to be set as the intended destination.
     * @param array $parameters An optional array of parameters to be used in generating the route URL.
     * @param bool $absolute Whether to generate an absolute URL (true) or a relative URL (false).
     * @param string|array|callable|null $conditions The condition(s) for redirection. Can be a string, an array of strings or callables, or a single callable.
     *  Available conditions:
     *   - onboarding_start: User is logged in and has started onboarding
     *   - onboarding_skipped: User is logged in and has skipped onboarding
     *   - onboarding_completed: User is logged in and has completed onboarding
     *   - is_admin: User is logged in and has admin privileges
     *   - is_user: User is logged in and is a regular user
     *   - is_logged_in: User is logged in
     *   - is_not_logged_in: User is not logged in
     * @param int $validity An optional validity period for the intended URL in minutes.
     * @return void
     */
    function set_intended_route($name, $parameters = [], $absolute = true, $condition = null, int $validity = 10)
    {
        $url = route($name, $parameters, $absolute);
        RedirectToIntendedRoute::setIntended($url, $condition, $validity);
    }
}

if (!function_exists('get_intended')) {
    /**
     * Retrieves the intended from the cookie.
     *
     * This function retrieves the 'intended' cookie value, which contains
     * the URL that was previously set as the intended destination.
     *
     * @return string|null The intended URL or null if no cookie is found.
     */
    function get_intended()
    {
        return RedirectToIntendedRoute::getIntended();
    }
}


if (!function_exists('delete_intended_url')) {
    /**
     * Deletes the intended URL cookie.
     *
     * This function removes the 'intended' cookie, effectively clearing
     * any previously set intended URL or route.
     *
     * @return void
     */
    function delete_intended_url()
    {
        RedirectToIntendedRoute::deleteIntended();
    }
}
