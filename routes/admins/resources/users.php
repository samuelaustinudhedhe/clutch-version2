<?php

/**
 * Admin Resource: Users Management Routes
 *
 * This file defines the routes for managing admin users, including listing, creating, editing, and showing user details.
 * These routes are prefixed with 'users' and named with 'users.' prefix.
 * They are protected by middleware that checks for 'SuperAdmin' or 'Administrator' roles and 'manage_users' permission.
 */

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Users\Create;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Users\Index;
use App\View\Livewire\Admin\Resources\Users\Show;

/**
 * Group of admin users management routes
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
     * GET /admin/users
     *
     * @uses Index Livewire component to display the list of users
     */
    Route::get('/', Index::class)->name('index');

    /**
     * Show create user form
     *
     * GET /admin/users/create
     *
     * @uses Create Livewire component to display the create user form
     */
    Route::get('create', Create::class)->name('create');

    /**
     * Show edit user form
     *
     * GET /admin/users/edit/{user}
     *
     * @uses Index Livewire component to display the edit user form
     * @param int $user The ID of the user to edit
     * @note This route uses the Index component, which might be incorrect. Consider creating an Edit component.
     */
    Route::get('edit/{user}', Index::class)->name('edit');

    /**
     * Show user details
     *
     * GET /admin/users/show/{user}
     *
     * @uses Show Livewire component to display the user details
     * @param int $user The ID of the user to show
     */
    Route::get('show/{user}', Show::class)->name('show');
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
 * 1. There are two routes for the index page ('/' path), one with an empty name.
 *    Consider removing the route with the empty name to avoid conflicts.
 * 2. The edit route uses the Index component, which might not be correct.
 *    Consider creating a dedicated Edit component for editing users.
 * 3. There's no route for deleting users. If user deletion is a required feature,
 *    consider adding a delete route with appropriate HTTP method (DELETE or POST).
 */
