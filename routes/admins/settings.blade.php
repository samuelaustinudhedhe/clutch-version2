<?php

use Illuminate\Support\Facades\Route;
use App\Http\Kernel;

use App\View\Livewire\Admin\Profile;

Route::prefix(app_admin_url() . '/settings')->name('admin.settings.')->middleware(Kernel::adminAuthMiddleware())->group(function () {
    Route::get('/',  Profile::class)->name('show');
});
