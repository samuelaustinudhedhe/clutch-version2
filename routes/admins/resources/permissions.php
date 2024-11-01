<?php
/**
 * Admin Resource: Permissions Management Routes
 *
 * This file defines the routes for managing permissions in the admin panel.
 * It sets up the necessary routes for CRUD (Create, Read, Update, Delete) operations on permissions.
 * The routes use Livewire components for handling both the logic and views, providing a dynamic user interface.
 *
 */

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Permissions\Index as PermissionsIndex;
use App\View\Livewire\Admin\Resources\Permissions\Edit as PermissionEdit;
use App\View\Livewire\Admin\Resources\Permissions\Create as PermissionCreate;
use App\View\Livewire\Admin\Resources\Permissions\Show as PermissionShow;

/**
 * Group of routes for managing Permissions users.
 *
 * These routes are protected by multiple middleware to ensure the Admin has the necessary permissions and role required to access it.
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
     * @uses App\View\Livewire\Admin\Resources\Permissions\Index
     * @return \Illuminate\Http\Response
     */
    Route::get('/', PermissionsIndex::class)->name('index');

    /**
     * Show the form for creating a new permission.
     *
     * @uses App\View\Livewire\Admin\Resources\Permissions\Create
     * @return \Illuminate\Http\Response
     */
    Route::get('create', PermissionCreate::class)->name('create');

    /**
     * Show the form for editing the specified permission.
     *
     * @uses App\View\Livewire\Admin\Resources\Permissions\Edit
     * @param int $role The ID of the role/permission to edit
     * @return \Illuminate\Http\Response
     */
    Route::get('edit/{role}', PermissionEdit::class)->name('edit');

    /**
     * Display the specified permission.
     *
     * @uses App\View\Livewire\Admin\Resources\Permissions\Show
     * @param int $role The ID of the role/permission to show
     * @return \Illuminate\Http\Response
     */
    Route::get('show/{role}', PermissionShow::class)->name('show');
});
