<?php

/**
 * Admin Resource: Users Management Routes
 *
 * This file defines the routes for managing users, including listing, creating, editing, and showing user details.
 * These routes are prefixed with 'users' and named with 'users.' prefix.
 * They are protected by middleware that checks for 'SuperAdmin' or 'Administrator' roles and 'manage_users' permission.
 */

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Users\Create;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Users\Index;
use App\View\Livewire\Admin\Resources\Users\Show;

/**
 * Define the admin routes for user management.
 *
 * This group of routes is responsible for handling user management functionalities
 * such as listing users, creating new users, editing existing users, and viewing user details.
 * The routes are protected by middleware to ensure only authorized users can access them.
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Group of admin users management routes
     *
     * This group of routes is specifically for managing admin users.
     * It includes routes for listing, creating, editing, and showing user details.
     * The routes are protected by role and permission middleware.
     *
     * Middleware:
     * @uses Kernel::role() Middleware to ensure the user has either 'SuperAdmin' or 'Administrator' role
     * @uses Kernel::permission() Middleware to check for 'manage_users' permission
     */
    Route::prefix('users')->name('users.')->middleware(
        [
            Kernel::role(['SuperAdmin', 'Administrator'], 'admin'),
            Kernel::permission(['manage_users'], 'admin')
        ]
    )->group(function () {

        /**
         * List all users
         *
         * This route displays a list of all admin users.
         * It uses a Livewire component to render the user list dynamically.
         *
         * GET /admin/users
         *
         * @uses Index Livewire component to display the list of users
         * @return \Illuminate\View\View
         * @example Access the users index via GET /admin/users
         */
        Route::get('/', Index::class)->name('index');

        /**
         * Show create user form
         *
         * This route displays a form for creating a new admin user.
         * It uses a Livewire component to render the form dynamically.
         *
         * GET /admin/users/create
         *
         * @uses Create Livewire component to display the create user form
         * @return \Illuminate\View\View
         * @example Access the create user form via GET /admin/users/create
         */
        Route::get('create', Create::class)->name('create');

        /**
         * Show edit user form
         *
         * This route displays a form for editing an existing admin user.
         * It requires the ID of the user to be edited as a parameter.
         * Note: This route currently uses the Index component, which might not be correct.
         * Consider creating a dedicated Edit component for editing users.
         *
         * GET /admin/users/edit/{user}
         *
         * @uses Index Livewire component to display the edit user form
         * @param int $user The ID of the user to edit
         * @return \Illuminate\View\View
         * @example Access the edit user form via GET /admin/users/edit/{user}
         */
        Route::get('edit/{user}', Index::class)->name('edit');

        /**
         * Show user details
         *
         * This route displays the details of a specific admin user.
         * It requires the ID of the user to be shown as a parameter.
         * It uses a Livewire component to render the user details dynamically.
         *
         * GET /admin/users/show/{user}
         *
         * @uses Show Livewire component to display the user details
         * @param int $user The ID of the user to show
         * @return \Illuminate\View\View
         * @example Access the user details via GET /admin/users/show/{user}
         */
        Route::get('show/{user}', Show::class)->name('show');
    });
});

/**
 * Usage Examples:
 *
 * 1. Generate URL for users index page:
 *    $usersIndexUrl = route('users.index');
 *
 * 2. Generate URL for creating a new user:
 *    $createUserUrl = route('users.create');
 *
 * 3. Generate URL for editing a user (assuming user ID is 1):
 *    $editUserUrl = route('users.edit', ['user' => 1]);
 *
 * 4. Generate URL for showing a user's details (assuming user ID is 1):
 *    $showUserUrl = route('users.show', ['user' => 1]);
 *
 * 5. In Blade template, create a link to users index:
 *    <a href="{{ route('users.index') }}">Manage Users</a>
 *
 * 6. In Blade template, create a form to edit a user (assuming user ID is stored in $userId):
 *    <form method="GET" action="{{ route('users.edit', ['user' => $userId]) }}">
 *        @csrf
 *        <button type="submit">Edit User</button>
 *    </form>
 *
 * @note There are a few potential issues in this route file:
 * 1. The edit route uses the Index component, which might not be correct.
 *    Consider creating a dedicated Edit component for editing users.
 * 2. There's no route for deleting users. If user deletion is a required feature,
 *    consider adding a delete route with appropriate HTTP method (DELETE or POST).
 */