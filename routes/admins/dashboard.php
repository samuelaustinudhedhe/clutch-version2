<?php

use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Kernel;
use App\View\Livewire\Admin\Profile;
use Illuminate\Support\Facades\Route;

/**
 * Define admin routes with authentication middleware.
 *
 * This route group applies the admin authentication middleware to all routes within it.
 * It uses the 'admin.' prefix for naming routes, which helps in organizing and referencing them.
 *
 * @uses App\Http\Kernel::adminAuthMiddleware
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Define dashboard routes.
     *
     * This route group handles the admin dashboard display. It maps the root URL and 'dashboard'
     * URL to the same controller action, allowing flexibility in accessing the dashboard.
     *
     * @uses App\Http\Controllers\Admin\Dashboard\AdminDashboardController::show
     */
    Route::group([], function () {
        /**
         * Display the admin dashboard.
         *
         * This route maps the root URL to the 'show' method of the AdminDashboardController.
         * It is named 'admin.dashboard' for easy reference.
         *
         * @example Access the dashboard via the root URL or '/dashboard'.
         */
        Route::get('/', [AdminDashboardController::class, 'show'])->name('dashboard');

        /**
         * Display the admin dashboard.
         *
         * This route maps the 'dashboard' URL to the 'show' method of the AdminDashboardController.
         * It is named 'admin.dashboard' for easy reference.
         *
         * @example Access the dashboard via the root URL or '/dashboard'.
         */
        Route::get('dashboard', [AdminDashboardController::class, 'show'])->name('dashboard');
    });

    /**
     * Define settings routes.
     *
     * This route group handles the admin settings page. It uses a Livewire component to render
     * the settings interface for the currently authenticated admin.
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
         * @return \Illuminate\View\View The rendered Livewire component view
         * @example Access the settings page via '/admin/settings'.
         */
        Route::get('/', Profile::class)->name('show');
    });

    /**
     * Define profile management routes.
     *
     * This route group handles the admin profile management. It applies the 'profile' prefix
     * to all routes within it and names them with the 'profile.' prefix for easy reference.
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
         * @return \Illuminate\View\View The rendered Livewire component view
         * @example Access the profile page via '/admin/profile'.
         */
        Route::get('/', Profile::class)->name('show');
    });
});