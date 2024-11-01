<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Profile;

/**
 * Define routes for admin profile management.
 *
 * This file contains routes related to viewing and managing the admin profile.
 * It uses Laravel's routing system and Livewire components for handling requests.
 */

/**
 * Group routes related to admin profile management.
 *
 * This route group applies the 'profile' prefix to all routes within it
 * and names them with the 'profile.' prefix for easy reference.
 *
 * @uses App\View\Livewire\Admin\Profile
 */
Route::prefix('profile')->name('profile.')->group(function () {
    /**
     * Display the admin profile page.
     *
     * This route uses a Livewire component to render the admin profile page.
     * It doesn't require any parameters as it shows the profile of the currently authenticated admin.
     *
     * @uses App\View\Livewire\Admin\Profile
     * @return \Illuminate\View\View The rendered Livewire component view
     *
     * @example
     * // Accessing the admin profile page
     * // GET /profile
     */
    Route::get('/', Profile::class)->name('show');
});