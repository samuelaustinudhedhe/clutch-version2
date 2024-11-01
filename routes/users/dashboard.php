<?php

use App\Http\Controllers\User\Dashboard\UserDashboardController as Dashboard;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Onboarding as OnboardingLayout;

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
     */
    Route::get('/',  [Dashboard::class, 'show']);

    /**
     * Show the user dashboard (named route)
     *
     * This route is identical to the root route but includes a name for easy referencing.
     *
     * @uses App\Http\Controllers\User\Dashboard\UserDashboardController::show
     * @return \Illuminate\Http\Response
     */
    Route::get('/dashboard',  [Dashboard::class, 'show'])->name('dashboard');

    /**
     * Show the user onboarding page
     *
     * This route displays the onboarding process for new users using a Livewire component.
     *
     * @uses App\View\Livewire\User\Onboarding
     * @return \Illuminate\Http\Response
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
     */
    Route::get('/settings', OnboardingLayout::class)->name('settings.show');
});