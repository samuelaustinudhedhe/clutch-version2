<?php

use App\Http\Controllers\User\Dashboard\UserDashboardController as Dashboard;
use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Onboarding as OnboardingLayout;

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
     * User Dashboard Routes
     *
     * This file defines the routes for the user dashboard and related functionalities.
     * It includes routes for the main dashboard, onboarding process, and user settings.
     */

    /**
     * Redirect from '/dashboard' to '/user/dashboard'
     *
     * This route ensures that users accessing '/dashboard' are redirected to the correct user dashboard URL.
     *
     * @example Accessing '/dashboard' will redirect to '/user/dashboard'
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    Route::redirect('/dashboard', '/user/dashboard');

    /**
     * User Dashboard Route Group
     *
     * This group contains all the routes related to the user dashboard and its functionalities.
     * No specific middleware is applied to this group, but individual routes may have their own protection.
     *
     * @uses App\Http\Controllers\User\Dashboard\UserDashboardController
     * @uses App\View\Livewire\User\Onboarding
     */
    Route::group([], function () {
        /**
         * Show the user dashboard homepage
         *
         * This route displays the main dashboard page for authenticated users.
         *
         * @uses App\Http\Controllers\User\Dashboard\UserDashboardController::show
         * @return \Illuminate\Http\Response
         * @example Accessing '/user' will display the user dashboard overview.
         */
        Route::get('/',  [Dashboard::class, 'show'])->name('dashboard.overview');

        /**
         * Show the user dashboard (named route)
         *
         * This route is identical to the root route but includes a name for easy referencing.
         *
         * @uses App\Http\Controllers\User\Dashboard\UserDashboardController::show
         * @return \Illuminate\Http\Response
         * @example Accessing '/user/dashboard' will display the user dashboard.
         */
        Route::get('/dashboard',  [Dashboard::class, 'show'])->name('dashboard');

        /**
         * Show the user onboarding page
         *
         * This route displays the onboarding process for new users using a Livewire component.
         *
         * @uses App\View\Livewire\User\Onboarding
         * @return \Illuminate\Http\Response
         * @example Accessing '/user/onboarding' will display the onboarding page.
         */
        Route::get('/onboarding', OnboardingLayout::class)->name('onboarding');

        /**
         * Show the user settings page
         *
         * This route displays the user settings page, which currently uses the same Livewire component as onboarding.
         * Consider creating a separate component for settings if the functionality differs significantly.
         *
         * @uses App\View\Livewire\User\Onboarding
         * @return \Illuminate\Http\Response
         * @example Accessing '/user/settings' will display the settings page.
         */
        Route::get('/settings', OnboardingLayout::class)->name('settings.show');
    });
});
