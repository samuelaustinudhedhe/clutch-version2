<?php

use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Kernel;
use Illuminate\Support\Facades\Route;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::get('/', [AdminDashboardController::class, 'show'])->name('dashboard');
    Route::get('dashboard', [AdminDashboardController::class, 'show'])->name('dashboard');
});
