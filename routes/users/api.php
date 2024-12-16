<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Request;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

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
    Route::get('/', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    /**
     * Define routes for API token management using Laravel Jetstream.
     *
     * These routes handle the display of user's API tokens. They are grouped under
     * the 'verified' middleware to ensure only verified users can access them.
     *
     * @uses Laravel\Jetstream\Jetstream
     * @uses Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController
     */
    Route::group(['middleware' => 'verified'], function () {
        /**
         * Check if API features are enabled in Jetstream configuration.
         *
         * @return void
         */
        if (Jetstream::hasApiFeatures()) {
            /**
             * Display the user's API tokens.
             *
             * This route will show a list of the authenticated user's API tokens,
             * allowing them to manage (create, delete, update permissions) their tokens.
             *
             * @uses Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController::index
             * @return \Illuminate\View\View
             *
             * @example GET /user/api-tokens
             */
            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        }
    });
});
