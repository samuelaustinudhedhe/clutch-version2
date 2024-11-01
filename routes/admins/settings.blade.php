<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Profile;

/**
 * Define routes for admin settings management.
 *
 * This file contains routes related to viewing and managing the admin settings.
 * It uses Laravel's routing system and Livewire components for handling requests.
 */

/**
 * Group routes related to admin settings management.
 *
 * This route group applies the 'settings' prefix to all routes within it
 * and names them with the 'settings.' prefix for easy reference.
 *
 * @uses App\View\Livewire\Admin\Settings
 */
Route::prefix('settings')->name('settings.')->group(function () {
    /**
     * Display the admin settings page.
     *
     * This route uses a Livewire component to render the admin settings page.
     * It doesn't require any parameters as it shows the settings interface
     * for the currently authenticated admin.
     *
     * @uses App\View\Livewire\Admin\Settings
     * @return \Illuminate\View\View The rendered Livewire component view
     *
     * @example
     * // Accessing the admin settings page
     * // GET /settings
     */
    Route::get('/', Profile::class)->name('show');
});