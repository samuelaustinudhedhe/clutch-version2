<?php

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Users\Create as UsersCreate;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Users\Index as UsersIndex;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('users')->name('users.')->middleware([Kernel::role(['SuperAdmin', 'Administrator']), Kernel::permission(['manage_users'])])->group(function () {
        Route::get('/', UsersIndex::class)->name('index');
        Route::get('create',  UsersCreate::class)->name('create');
        Route::get('edit/{role}', UsersIndex::class)->name('edit');
        Route::get('show/{role}', UsersIndex::class)->name('show');
    });
});
