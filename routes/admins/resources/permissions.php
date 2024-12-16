<?php

/**
 * Admin Resource: Permissions Management Routes
 *
 * This file defines the routes for managing permissions in the admin panel.
 * It sets up the necessary routes for CRUD (Create, Read, Update, Delete) operations on permissions.
 * The routes use Livewire components for handling both the logic and views, providing a dynamic user interface.
 * These routes are protected by middleware to ensure only authorized users with the appropriate roles and permissions can access them.
 */

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Permissions\Index as PermissionsIndex;
use App\View\Livewire\Admin\Resources\Permissions\Edit as PermissionEdit;
use App\View\Livewire\Admin\Resources\Permissions\Create as PermissionCreate;
use App\View\Livewire\Admin\Resources\Permissions\Show as PermissionShow;

/**
 * Define the admin routes with authentication and authorization middleware.
 *
 * This route group applies the admin authentication middleware to all routes within it.
 * It uses the 'admin.' prefix for naming routes, which helps in organizing and referencing them.
 *
 * @uses App\Http\Kernel::adminAuthMiddleware
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Group of routes for managing permissions.
     *
     * These routes are protected by multiple middleware to ensure the admin has the necessary permissions and role required to access them.
     * The routes use Livewire components to handle the CRUD operations for permissions.
     *
     * Middleware:
     * @uses \App\Http\Kernel::permission(['manage_permissions'], 'admin'): Ensures the user has the 'manage_permissions' permission.
     * @uses \App\Http\Kernel::role('SuperAdmin', 'admin'): Ensures the user has the 'SuperAdmin' role.
     *
     * Route Prefix: 'permissions'
     * Name Prefix: 'permissions.'
     *
     * @example Accessing the permissions index: GET /admin/permissions
     * @example Creating a new permission: GET /admin/permissions/create
     * @example Editing a permission: GET /admin/permissions/edit/{role}
     * @example Viewing a permission: GET /admin/permissions/show/{role}
     */
    Route::prefix('permissions')->name('permissions.')->middleware(
        [
            Kernel::permission(['manage_permissions'], 'admin'),
            Kernel::role('SuperAdmin', 'admin')
        ]
    )->group(function () {

        /**
         * Display a listing of all permissions.
         *
         * This route uses a Livewire component to render a list of all permissions.
         * It is accessible only to users with the appropriate role and permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Permissions\Index
         * @return \Illuminate\Http\Response
         * @example Access the permissions index via GET /admin/permissions
         */
        Route::get('/', PermissionsIndex::class)->name('index');

        /**
         * Show the form for creating a new permission.
         *
         * This route uses a Livewire component to render a form for creating a new permission.
         * It is accessible only to users with the appropriate role and permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Permissions\Create
         * @return \Illuminate\Http\Response
         * @example Access the create form via GET /admin/permissions/create
         */
        Route::get('create', PermissionCreate::class)->name('create');

        /**
         * Show the form for editing the specified permission.
         *
         * This route uses a Livewire component to render a form for editing an existing permission.
         * It requires the ID of the permission to be edited as a parameter.
         * It is accessible only to users with the appropriate role and permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Permissions\Edit
         * @param int $role The ID of the role/permission to edit
         * @return \Illuminate\Http\Response
         * @example Access the edit form via GET /admin/permissions/edit/{role}
         */
        Route::get('edit/{role}', PermissionEdit::class)->name('edit');

        /**
         * Display the specified permission.
         *
         * This route uses a Livewire component to render the details of a specific permission.
         * It requires the ID of the permission to be displayed as a parameter.
         * It is accessible only to users with the appropriate role and permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Permissions\Show
         * @param int $role The ID of the role/permission to show
         * @return \Illuminate\Http\Response
         * @example Access the show page via GET /admin/permissions/show/{role}
         */
        Route::get('show/{role}', PermissionShow::class)->name('show');
    });
});