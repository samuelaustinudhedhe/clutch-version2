<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Permissions\Index as PermissionsIndex;
use App\View\Livewire\Admin\Resources\Permissions\Edit as PermissionEdit;
use App\View\Livewire\Admin\Resources\Permissions\Create as PermissionCreate;
use App\View\Livewire\Admin\Resources\Permissions\Show as PermissionShow;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('permissions')->name('permissions.')->middleware([ Kernel::permission(['manage_permissions'],'admin'),Kernel::role('SuperAdmin','admin')])->group(function () {
        Route::get('/', PermissionsIndex::class)->name('index');
        Route::get('create', PermissionCreate::class)->name('create');
        Route::get('edit/{role}', PermissionEdit::class)->name('edit');
        Route::get('show/{role}', PermissionShow::class)->name('show');
    });
});
