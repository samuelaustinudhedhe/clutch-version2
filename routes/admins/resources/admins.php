<?php

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Permissions\Edit as PermissionEdit;
use App\View\Livewire\Admin\Resources\Permissions\Create as PermissionCreate;
use App\View\Livewire\Admin\Resources\Permissions\Show as PermissionShow;
use App\View\Livewire\Admin\Resources\Admins\Index as AdminsIndex;
use Illuminate\Support\Facades\Route;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('admins')->name('admins.')->middleware(['admin', Kernel::role(['SuperAdmin'],'admin') ,Kernel::permission(['manage_admins','manage_users'],'admin')])->group(function () {
        Route::get('/', AdminsIndex::class)->name('index');
        Route::get('create', PermissionCreate::class)->name('create');
        Route::get('edit/{role}', PermissionEdit::class)->name('edit');
        Route::get('show/{role}', PermissionShow::class)->name('show');
    });
});
