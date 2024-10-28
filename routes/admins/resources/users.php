<?php

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Users\Create;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Users\Index;
use App\View\Livewire\Admin\Resources\Users\Show;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('users')->name('users.')->middleware([Kernel::role(['SuperAdmin', 'Administrator'],'admin'), Kernel::permission(['manage_users'],'admin')])->group(function () {
        Route::get('/', Index::class)->name('');
        Route::get('/', Index::class)->name('index');
        Route::get('create',  Create::class)->name('create');
        Route::get('edit/{user}', Index::class)->name('edit');
        Route::get('show/{user}', Show::class)->name('show');
    });
});
