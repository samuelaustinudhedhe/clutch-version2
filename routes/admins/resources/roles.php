<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Roles\Index as RolesIndex;
use App\View\Livewire\Admin\Resources\Roles\Edit as RoleEdit;
use App\View\Livewire\Admin\Resources\Roles\Create as RoleCreate;
use App\View\Livewire\Admin\Resources\Roles\Show as RoleShow;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('roles')->name('roles.')->middleware([ Kernel::permission(['manage_roles']), Kernel::role('SuperAdmin')])->group(function () {
        Route::get('/', RolesIndex::class)->name('index');
        Route::get('/create', RoleCreate::class)->name('create');
        Route::get('/edit/{role}', RoleEdit::class)->name('edit');
        Route::get('/show/{role}', RoleShow::class)->name('show');
        Route::get('/destroy/{role}', RoleShow::class)->name('destroy');
    });
});
 