<?php

use Illuminate\Support\Facades\Route;

/**
 * Define the main web routes for the application.
 *
 * This file contains the core routing logic, including a route for retrieving
 * the CSRF token and logic to include other route files.
 */

/**
 * Route to retrieve the CSRF token.
 *
 * This route returns a JSON response containing the CSRF token.
 * It's useful for JavaScript applications that need to make
 * POST requests to your Laravel backend.
 *
 * @return \Illuminate\Http\JsonResponse
 *
 * @throws \Exception If the CSRF token cannot be generated.
 *
 * @example
 * // JavaScript fetch example
 * fetch('/csrf-token')
 *     .then(response => response.json())
 *     .then(data => {
 *         // Use the token in your requests
 *         console.log(data.token);
 *     });
 */
Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

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
require_recursively(__DIR__ , maxDepth:1);

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
require_recursively(__DIR__ ,filename:'controller', maxDepth: 2);

