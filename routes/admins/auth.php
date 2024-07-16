<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix(app_admin_url())->name('admin.')->group(function () {
    // Login
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    // Logout
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout'); //Resolves: GET method is not supported for route admin/logout.
    // Register
    Route::get('register', [AdminAuthController::class, 'showRegistration'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register']);
});