<?php

use Illuminate\Support\Facades\Route;
use App\Http\Kernel;

/**
 * Define the main web routes for the application.
 *
 * This file contains the core routing logic, including a route for retrieving
 * the CSRF token and logic to include other route files.
 */

/**
 * Include all PHP files in the routes root folder.
 *
 * This function recursively includes all PHP files in the current directory.
 * It's used to modularize the routing logic across multiple files.
 *
 * @param string $dir The directory to search in (current directory in this case)
 * @param array $extensions File extensions to include (PHP in this case)
 * @param string $folder Subdirectory to search in (empty string in this case)
 * @param int $depth How deep to recurse into subdirectories (1 in this case)
 * @param int $hidden Whether to include hidden files (0 in this case)
 */
require_recursively(__DIR__ , maxDepth:0);

/**
 * Include controller files for other routes.
 *
 * This function recursively includes all PHP files named 'controller' subdirectory.
 * It's used to include controller-specific route definitions.
 * Used by users and admins
 *
 * @param string $dir The directory to search in (current directory in this case)
 * @param array $extensions File extensions to include (PHP in this case)
 * @param string $folder Subdirectory to search in ('controller' in this case)
 * @param int $depth How deep to recurse into subdirectories (2 in this case)
 * @param int $hidden Whether to include hidden files (0 in this case)
 */
require_recursively(__DIR__ ,filename:'controller', maxDepth: 1);

// // Admins
// require_once(__DIR__ . '/admins/auth.php');

// Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

//     require_once(__DIR__ . '/admins/dashboard.php');
//     require_once(__DIR__ . '/admins/notifications.php');
//     require_once(__DIR__ . '/admins/pages.php');
//     require_once(__DIR__ . '/admins/profile.php');
//     require_once(__DIR__ . '/admins/settings.blade.php');

//     require_once(__DIR__ . '/admins/resources/admins.php');
//     require_once(__DIR__ . '/admins/resources/orders.php');
//     require_once(__DIR__ . '/admins/resources/trips.php');
//     require_once(__DIR__ . '/admins/resources/users.php');
//     require_once(__DIR__ . '/admins/resources/roles.php');
//     require_once(__DIR__ . '/admins/resources/permissions.php');
//     require_once(__DIR__ . '/admins/resources/vehicles.php');
// });

// // users
// Route::prefix('user')->name('user.')->middleware(
//     [
//         Kernel::getAuthMiddleware(),
//         Kernel::getAuthSessionMiddleware(),
//         'onboarding',
//         'intended'
//     ]
// )->group(function () {
//     require_once(__DIR__ . '/users/dashboard.php');
//     require_once(__DIR__ . '/users/profile.php');

//     require_once(__DIR__ . '/users/api.php');
//     require_once(__DIR__ . '/users/orders.php');
//     require_once(__DIR__ . '/users/trips.php');
//     require_once(__DIR__ . '/users/bookings.php');
//     require_once(__DIR__ . '/users/wallet.php');
//     require_once(__DIR__ . '/users/teams.php');
//     require_once(__DIR__ . '/users/vehicles.php');
// });
