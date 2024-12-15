<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;

/**
 * Admin Routes Controller
 *
 * This file serves as the main entry point for all admin-related routes, and should not be tempered with.
 * It sets up a route group with specific prefix, name, and middleware,
 * then includes all other admin route files recursively.
 */
/**
 * Include Admin Authentication routes.
 *
 * This function recursively includes all PHP files named 'auth' in the admins subdirectory.
 * It's used to include authentication-related route definitions.
 *
 * @param string $dir The directory to search in (current directory in this case)
 * @param array $extensions File extensions to include (PHP in this case)
 * @param string $folder Subdirectory to search in ('auth' in this case)
 * @param int $depth How deep to recurse into subdirectories (2 in this case)
 * @param int $hidden Whether to include hidden files (0 in this case)
 */
// require_recursively(__DIR__ , filename:'auth');
require_once(__DIR__ . '/auth.php');


/**
 * Admin Route Group
 *
 * This group applies common configurations to all admin routes:
 * - Prefix: Determined by app_admin_url() helper function
 * - Name: All route names are prefixed with 'admin.'
 * - Middleware: Applies admin authentication middleware
 *
 * @uses App\Http\Kernel::adminAuthMiddleware()
 * @uses app_admin_url()
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Include all routes in the admin routes directory
     *
     * This function recursively requires all PHP files in the current directory,
     * effectively including all admin route definitions.
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
     *          - routes/admins/dashboard.php
     *          - routes/admins/resources/vehicles/index.php
     *          - routes/admins/settings/general.php
     *          But will not go deeper than 5 levels of subdirectories.
     */
    //require_recursively(__DIR__ , exclude:'auth');

    //
    require_once(__DIR__ . '/dashboard.php');
    require_once(__DIR__ . '/notifications.php');
    require_once(__DIR__ . '/pages.php');
    require_once(__DIR__ . '/profile.php');
    require_once(__DIR__ . '/settings.blade.php');

    // resources
    require_once(__DIR__ . '/resources/admins.php');
    require_once(__DIR__ . '/resources/orders.php');
    require_once(__DIR__ . '/resources/trips.php');
    require_once(__DIR__ . '/resources/users.php');
    require_once(__DIR__ . '/resources/roles.php');
    require_once(__DIR__ . '/resources/permissions.php');
    require_once(__DIR__ . '/resources/vehicles.php');
});
