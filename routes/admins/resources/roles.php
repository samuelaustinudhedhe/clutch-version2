<?php

/**
 * Admin Resource: Roles Management Routes
 *
 * This file defines the routes for managing admin roles, including listing, creating, editing, showing, and destroying roles.
 * These routes are prefixed with 'roles' and named with 'roles.' prefix.
 * They are protected by middleware that checks for 'manage_roles' permission and 'SuperAdmin' role.
 */

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Roles\Index as RolesIndex;
use App\View\Livewire\Admin\Resources\Roles\Edit as RoleEdit;
use App\View\Livewire\Admin\Resources\Roles\Create as RoleCreate;
use App\View\Livewire\Admin\Resources\Roles\Show as RoleShow;

/**
 * Group of admin roles management routes
 *
 * These routes are protected by multiple middleware to ensure the Admin has the necessary permissions and role required to access it.
 * 
 * Middleware:
 * @uses Kernel::permission() Middleware to check for 'manage_roles' permission
 * @uses Kernel::role() Middleware to ensure the user has the 'SuperAdmin' role
 */
Route::prefix('roles')->name('roles.')->middleware(
    [
        Kernel::permission(['manage_roles'], 'admin'),
        Kernel::role('SuperAdmin', 'admin')
    ]
)->group(function () {
    /**
     * List all roles
     *
     * GET /admin/roles
     *
     * @uses RolesIndex Livewire component to display the list of roles
     */
    Route::get('/', RolesIndex::class)->name('index');

    /**
     * Show create role form
     *
     * GET /admin/roles/create
     *
     * @uses RoleCreate Livewire component to display the create role form
     */
    Route::get('/create', RoleCreate::class)->name('create');

    /**
     * Show edit role form
     *
     * GET /admin/roles/edit/{role}
     *
     * @uses RoleEdit Livewire component to display the edit role form
     * @param int $role The ID of the role to edit
     */
    Route::get('/edit/{role}', RoleEdit::class)->name('edit');

    /**
     * Show role details
     *
     * GET /admin/roles/show/{role}
     *
     * @uses RoleShow Livewire component to display the role details
     * @param int $role The ID of the role to show
     */
    Route::get('/show/{role}', RoleShow::class)->name('show');

    /**
     * Destroy a role
     *
     * GET /admin/roles/destroy/{role}
     *
     * @uses RoleShow Livewire component to handle role deletion
     * @param int $role The ID of the role to destroy
     * @note This route uses GET method for destruction, which is unconventional. Consider using DELETE method instead.
     */
    Route::get('/destroy/{role}', RoleShow::class)->name('destroy');
});

/**
 * Usage Examples:
 *
 * 1. Generate URL for roles index page:
 *    $rolesIndexUrl = route('roles.index');
 *
 * 2. Generate URL for creating a new role:
 *    $createRoleUrl = route('roles.create');
 *
 * 3. Generate URL for editing a role (assuming role ID is 1):
 *    $editRoleUrl = route('roles.edit', ['role' => 1]);
 *
 * 4. Generate URL for showing a role's details (assuming role ID is 1):
 *    $showRoleUrl = route('roles.show', ['role' => 1]);
 *
 * 5. Generate URL for destroying a role (assuming role ID is 1):
 *    $destroyRoleUrl = route('roles.destroy', ['role' => 1]);
 *
 * 6. In Blade template, create a link to roles index:
 *    <a href="{{ route('roles.index') }}">Manage Roles</a>
 *
 * 7. In Blade template, create a form to delete a role (assuming role ID is stored in $roleId):
 *    <form method="GET" action="{{ route('roles.destroy', ['role' => $roleId]) }}"
 *          onsubmit="return confirm('Are you sure you want to delete this role?');">
 *        @csrf
 *        <button type="submit">Delete Role</button>
 *    </form>
 *
 * @note The destroy route uses GET method, which is not recommended for destructive actions.
 *       Consider changing it to use POST or DELETE method for better security and RESTful practices.
 */
