<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware to handle redirection to intended routes based on specified conditions.
 */
class RedirectToIntendedRoute
{
    // Constant for the cookie name used to store intended route information
    final const NAME = 'intended';

    /**
     * Handle an incoming request.
     * 
     * This method checks if there's an intended route stored in the cookie,
     * verifies if the conditions for redirection are met, and redirects if appropriate.
     *
     * @param Request $request The incoming HTTP request
     * @param Closure $next The next middleware in the pipeline
     * @return Response The HTTP response
     */
    final function handle(Request $request, Closure $next): Response
    {
        // Retrieve the intended route information from the cookie
        $intended = $this->getIntended($request);

        // Check if there's an intended URL and if the specified conditions are met
        if ($intended && isset($intended['url']) && $this->conditionIsMet($intended['conditions'] ?? null)) {
            // Delete the intended cookie to prevent unintended future redirects
            $this->deleteIntended();

            // Redirect to the intended URL
            return redirect($intended['url']);
        }

        // If no redirection is needed, pass the request to the next middleware
        return $next($request);
    }

    /**
     * Determines if the specified condition(s) are met.
     * 
     * This method supports multiple conditions and uses a map of condition
     * strings to their corresponding check functions.
     * 
     * Default conditions:
     *   - onboarding_start: User is logged in and has started onboarding
     *   - onboarding_skipped: User is logged in and has skipped onboarding
     *   - onboarding_completed: User is logged in and has completed onboarding
     *   - is_admin: User is logged in and has admin privileges
     *   - is_user: User is logged in and is a regular user
     *   - is_logged_in: User is logged in
     *   - is_not_logged_in: User is not logged in
     *
     * @param string|array|null $conditions The condition(s) to check. Can be null, a string, or an array of strings.
     * @return bool Returns true if all conditions are met (or if no conditions are specified), false otherwise.
     */
    protected function conditionIsMet($conditions): bool
    {
        // If no conditions are specified, return true
        if ($conditions === null) {
            return true;
        }

        // Ensure conditions is an array
        $conditions = (array) $conditions;

        // Get the condition checks
        $conditionChecks = $this->getConditionChecks();

        // Check each condition
        foreach ($conditions as $condition) {
            if (is_string($condition)) {
                // Check predefined conditions
                if (!isset($conditionChecks[$condition]) || !$conditionChecks[$condition]()) {
                    return false;
                }
            } elseif (is_callable($condition)) {
                // Check custom condition
                if (!$condition()) {
                    return false;
                }
            } else {
                // Invalid condition type
                return false;
            }
        }

        // All conditions are met
        return true;
    }

    /**
     * Get the map of condition strings to their corresponding check functions.
     * 
     * Available conditions:
     *   - onboarding_start: User is logged in and has started onboarding
     *   - onboarding_skipped: User is logged in and has skipped onboarding
     *   - onboarding_completed: User is logged in and has completed onboarding
     *   - is_admin: User is logged in and has admin privileges
     *   - is_user: User is logged in and is a regular user
     *   - is_logged_in: User is logged in
     *   - is_not_logged_in: User is not logged in
     *
     * @return array An associative array of condition keys and their corresponding check functions.
     */
    protected function getConditionChecks(): array
    {
        return [
            /**
             * Check if the user is logged in and has started the onboarding process.
             *
             * @return bool True if the user is logged in and has started onboarding, false otherwise.
             */
            'onboarding_start' => fn() => isLoggedIn() && getPerson()->onboardingStart(),

            /**
             * Check if the user is logged in and has skipped the onboarding process.
             *
             * @return bool True if the user is logged in and has skipped onboarding, false otherwise.
             */
            'onboarding_skipped' => fn() => isLoggedIn() && getPerson()->onboardingIsSkipped(),

            /**
             * Check if the user is logged in and has completed the onboarding process.
             *
             * @return bool True if the user is logged in and has completed onboarding, false otherwise.
             */
            'onboarding_completed' => fn() => isLoggedIn() && getPerson()->onboardingCompleted(),

            /**
             * Check if the user is logged in and has admin privileges.
             *
             * @return bool True if the user is logged in and is an admin, false otherwise.
             */
            'is_admin' => fn() => isLoggedIn() && getAdmin(),

            /**
             * Check if the user is logged in and is a regular user (not an admin).
             *
             * @return bool True if the user is logged in and is a regular user, false otherwise.
             */
            'is_user' => fn() => isLoggedIn() && getUser(),

            /**
             * Check if the user is logged in.
             *
             * @return bool True if the user is logged in, false otherwise.
             */
            'is_logged_in' => fn() => isLoggedIn(),

            /**
             * Check if the user is not logged in.
             *
             * @return bool True if the user is not logged in, false otherwise.
             */
            'is_not_logged_in' => fn() => !isLoggedIn(),

            // Add more predefined conditions here as needed
        ];
    }

    /**
     * Set the intended URL and condition(s) for redirection.
     *
     * This method stores the intended route information in a cookie.
     *
     * @param string $url The URL to redirect to.
     * @param string|array|callable|null $conditions The condition(s) for redirection. Can be a string, an array of strings or callables, or a single callable.
     * @param int $validity The cookie validity period in minutes.
     * @return void
     */
    final static function setIntended(string $url, $conditions = null, int $validity = 10): void
    {
        $intended = [
            'url' => $url,
            'conditions' => $conditions,
        ];

        // Set the cookie with the intended route information
        Cookie::queue(self::NAME, json_encode($intended), $validity);
    }

    /**
     * Delete the intended URL cookie.
     *
     * @return void
     */
    final static function deleteIntended(): void
    {
        Cookie::queue(Cookie::forget(self::NAME));
    }

    /**
     * Get the intended URL and conditions from the cookie.
     *
     * This method attempts to retrieve the intended route information
     * from either the request object or the cookie storage.
     *
     * @param Request|null $request The HTTP request object (optional)
     * @param bool $associative Whether to return an associative array (true) or object (false)
     * @return array|null Returns an associative array with 'url' and 'conditions' keys, or null if the cookie does not exist or is not valid.
     */
    final static function getIntended(?Request $request = null, bool $associative = true): ?array
    {
        $intended = null;
        // If the request object is provided, attempt to get the cookie from the request
        if ($request) {
            $intended = $request->cookie(self::NAME);
        }
        // If the intended data is still null, attempt to get it directly from the cookie storage
        if ($intended === null) {
            $intended = Cookie::get(self::NAME);
        }
        // If the cookie is not valid or does not exist, return null
        if ($intended === null) {
            return null;
        }

        // Decode the JSON-encoded cookie value and return the result
        return json_decode($intended, $associative) ?? null;
    }
}
