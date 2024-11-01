<?php

/**
 * Admin Authentication Routes
 *
 * This file defines the routes for admin authentication, including login, logout, and registration.
 * These routes are prefixed with the admin URL (determined by app_admin_url()) and named with 'admin.' prefix.
 */

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

/**
 * Group of admin authentication routes
 *
 * @uses app_admin_url() Function to determine the admin URL prefix
 * @uses AdminAuthController Controller handling admin authentication logic
 */
Route::prefix(app_admin_url())->name('admin.')->group(function () {
    /**
     * Admin Login Routes
     *
     * GET  /admin/login  - Show login form
     * POST /admin/login  - Process login attempt
     *
     * @uses AdminAuthController::showLogin() Display the login form
     * @uses AdminAuthController::login() Process the login attempt
     */
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);

    /**
     * Admin Logout Routes
     *
     * POST /admin/logout - Process logout (recommended method)
     * GET  /admin/logout - Alternative logout method (added for convenience)
     *
     * @uses AdminAuthController::logout() Process the logout request
     * @note The GET method is added to resolve the "GET method is not supported for route admin/logout" issue
     */
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    /**
     * Admin Registration Routes
     *
     * GET  /admin/register - Show registration form
     * POST /admin/register - Process registration attempt
     *
     * @uses AdminAuthController::showRegistration() Display the registration form
     * @uses AdminAuthController::register() Process the registration attempt
     */
    Route::get('register', [AdminAuthController::class, 'showRegistration'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register']);
});

/**
 * Usage Examples:
 *
 * 1. Generate URL for admin login page:
 *    $loginUrl = route('admin.login');
 *
 * 2. Redirect to admin logout (POST method):
 *    return redirect()->route('admin.logout')->withMethod('post');
 *
 * 3. Generate URL for admin registration page:
 *    $registerUrl = route('admin.register');
 *
 * 4. In Blade template, create a login form:
 *    <form method="POST" action="{{ route('admin.login') }}">
 *        @csrf
 *        <!-- form fields -->
 *    </form>
 *
 * 5. In Blade template, create a logout link:
 *    <a href="{{ route('admin.logout') }}" 
 *       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 *        Logout
 *    </a>
 *    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
 *        @csrf
 *    </form>
 */