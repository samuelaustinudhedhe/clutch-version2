<?php

use App\Http\Kernel;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

/**
 * User Routes Controller
 *
 * This file serves as the main entry point for all user-related routes, and should not be tempered with.
 * It sets up a route group with specific prefix, name, and middleware,
 * then includes all other user route files recursively. 
 */

/**
 * User Route Group
 *
 * This group applies common configurations to all user routes:
 * - Prefix: All routes are prefixed with 'user'
 * - Name: All route names are prefixed with 'user.'
 * - Middleware: Applies multiple middleware for authentication and verification
 *
 * @uses Laravel\Sanctum\HasApiTokens
 * @uses Laravel\Jetstream\Jetstream
 * @uses Illuminate\Support\Facades\Route
 *
 * Middleware applied:
 * - auth:sanctum: Ensures the user is authenticated using Laravel Sanctum
 * - config('jetstream.auth_session'): Applies the authentication session middleware configured in Jetstream
 * - verified: Ensures the user's email is verified (if using email verification)
 *
 * @example A route defined as 'profile' within this group would be accessible at '/user/profile'
 *          and would have the name 'user.profile'
 */
Route::prefix('user')->name('user.')->middleware(
    [
        Kernel::getAuthMiddleware(),
        Kernel::getAuthSessionMiddleware(),
        'onboarding',
        'intended'
    ]
)->group(function () {

    /**
     * Include all routes in the user routes directory
     *
     * This function recursively requires all PHP files in the current directory,
     * effectively including all user route definitions.
     *
     * @uses require_recursively()
     *
     * @param string $dir The directory to search for files (current directory in this case)
     * @param array $extensions File extensions to include (only 'php' in this case)
     * @param string $prependPath Prepend this path to all found files (empty in this case)
     * @param int $maxDepth Maximum depth of subdirectories to search (5 in this case)
     * @param int $currentDepth Current depth of recursion (0 in this case)
     *
     * @example This will include files like:
     *          - routes/users/profile.php
     *          - routes/users/settings/account.php
     *          - routes/users/notifications/preferences.php
     *          But will not go deeper than 5 levels of subdirectories.
     */
    require_recursively(__DIR__ , maxDepth: 5, currentDepth: 0);
});
