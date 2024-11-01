<?php
/**
 * Admin Resource: Admin Management Routes
 *
 * This file defines the routes for managing admin users in the application.
 * It uses Livewire components to handle the CRUD operations for admin users.
 */
use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Admins\Edit as AdminEdit;
use App\View\Livewire\Admin\Resources\Admins\Create as AdminCreate;
use App\View\Livewire\Admin\Resources\Admins\Show as AdminShow;
use App\View\Livewire\Admin\Resources\Admins\Index as AdminsIndex;
use Illuminate\Support\Facades\Route;

/**
 * Group of routes for managing admin users.
 *
 * These routes are protected by multiple middleware:
 * @uses \App\Http\Kernel::role(['SuperAdmin'], 'admin'): Ensures the user has the 'SuperAdmin' role.
 * @uses \App\Http\Kernel::permission(['manage_admins', 'manage_users'], 'admin'): Ensures the user has either 'manage_admins' or 'manage_users' permission.
 *
 * @uses App\Http\Kernel
 * @uses App\View\Livewire\Admin\Resources\Admins\Index
 * @uses App\View\Livewire\Admin\Resources\Admins\Create
 * @uses App\View\Livewire\Admin\Resources\Admins\Edit
 * @uses App\View\Livewire\Admin\Resources\Admins\Show
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
     * @uses App\View\Livewire\Admin\Resources\Admins\Index
     * @return \Illuminate\Http\Response
     */
    Route::get('/', AdminsIndex::class)->name('index');

    /**
     * Show the form for creating a new admin user.
     *
     * @uses App\View\Livewire\Admin\Resources\Admins\Create
     * @return \Illuminate\Http\Response
     */
    //Route::get('create', AdminCreate::class)->name('create');

    /**
     * Show the form for editing the specified admin user.
     *
     * @uses App\View\Livewire\Admin\Resources\Admins\Edit
     * @param int $role The ID of the admin user to edit
     * @return \Illuminate\Http\Response
     */
    //Route::get('edit/{role}', AdminEdit::class)->name('edit');

    /**
     * Display the specified admin user.
     *
     * @uses App\View\Livewire\Admin\Resources\Admins\Show
     * @param int $role The ID of the admin user to show
     * @return \Illuminate\Http\Response
     */
    //Route::get('show/{role}', AdminShow::class)->name('show');
});
