<?php

use Illuminate\Support\Facades\Route;
use App\Http\Kernel;

use App\View\Livewire\Admin\Profile;

Route::prefix(app_admin_url() . '/profile')->name('admin.profile.')->middleware(Kernel::adminAuthMiddleware())->group(function () {
    Route::get('/',  Profile::class)->name('show');
});
