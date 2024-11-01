<?php

use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {

    Route::get('/', [AdminDashboardController::class, 'show'])->name('dashboard');
    Route::get('dashboard', [AdminDashboardController::class, 'show'])->name('dashboard');
});
