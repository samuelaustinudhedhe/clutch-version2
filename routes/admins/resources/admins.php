<?php

/**
 * Admin Resource: Admin Management Routes
 *
 * This file defines the routes for managing admin users in the application.
 * It uses Livewire components to handle the CRUD operations for admin users.
 * The routes are protected by role and permission middleware to ensure only authorized users can access them.
 */

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Admins\Edit as AdminEdit;
use App\View\Livewire\Admin\Resources\Admins\Create as AdminCreate;
use App\View\Livewire\Admin\Resources\Admins\Show as AdminShow;
use App\View\Livewire\Admin\Resources\Admins\Index as AdminsIndex;
use Illuminate\Support\Facades\Route;

/**
 * Define admin routes with authentication and authorization middleware.
 *
 * This route group applies the admin authentication middleware to all routes within it.
 * It uses the 'admin.' prefix for naming routes, which helps in organizing and referencing them.
 *
 * @uses App\Http\Kernel::adminAuthMiddleware
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Group of routes for managing admin users.
     *
     * These routes are protected by multiple middleware:
     * - @uses \App\Http\Kernel::role(['SuperAdmin'], 'admin'): Ensures the user has the 'SuperAdmin' role.
     * - @uses \App\Http\Kernel::permission(['manage_admins', 'manage_users'], 'admin'): Ensures the user has either 'manage_admins' or 'manage_users' permission.
     *
     * The routes use Livewire components to handle the CRUD operations for admin users.
     *
     * Route Prefix: 'admins'
     * Name Prefix: 'admins.'
     *
     * @example Accessing the admin index: GET /admin/admins
     * @example Creating a new admin: GET /admin/admins/create
     * @example Editing an admin: GET /admin/admins/edit/{role}
     * @example Viewing an admin: GET /admin/admins/show/{role}
     */
    Route::prefix('admins')->name('admins.')->middleware(
        [
            Kernel::role(['SuperAdmin'], 'admin'),
            Kernel::permission(['manage_admins', 'manage_users'], 'admin')
        ]
    )->group(function () {
        /**
         * Display a listing of all admin users.
         *
         * This route uses a Livewire component to render a list of all admin users.
         * It is accessible only to users with the appropriate role and permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Admins\Index
         * @return \Illuminate\Http\Response
         * @example Access the admin index via GET /admin/admins
         */
        Route::get('/', AdminsIndex::class)->name('index');

        /**
         * Show the form for creating a new admin user.
         *
         * This route uses a Livewire component to render a form for creating a new admin user.
         * It is currently commented out, indicating it may be under development or not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Admins\Create
         * @return \Illuminate\Http\Response
         * @example Access the create form via GET /admin/admins/create
         */
        //Route::get('create', AdminCreate::class)->name('create');

        /**
         * Show the form for editing the specified admin user.
         *
         * This route uses a Livewire component to render a form for editing an existing admin user.
         * It requires the ID of the admin user to be edited as a parameter.
         * It is currently commented out, indicating it may be under development or not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Admins\Edit
         * @param int $role The ID of the admin user to edit
         * @return \Illuminate\Http\Response
         * @example Access the edit form via GET /admin/admins/edit/{role}
         */
        //Route::get('edit/{role}', AdminEdit::class)->name('edit');

        /**
         * Display the specified admin user.
         *
         * This route uses a Livewire component to render the details of a specific admin user.
         * It requires the ID of the admin user to be displayed as a parameter.
         * It is currently commented out, indicating it may be under development or not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Admins\Show
         * @param int $role The ID of the admin user to show
         * @return \Illuminate\Http\Response
         * @example Access the show page via GET /admin/admins/show/{role}
         */
        //Route::get('show/{role}', AdminShow::class)->name('show');
    });
});