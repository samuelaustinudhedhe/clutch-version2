<?php

use App\Http\Controllers\User\Dashboard\UserDashboardController as Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DynamicPageController as DynamicPage;
use App\Http\Kernel;
use App\View\Livewire\User\Onboarding as OnboardingLayout;
use Illuminate\Http\Request;

Route::redirect('/dashboard', '/user/dashboard');
Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding'])->group(function () {
    Route::get('/',  [Dashboard::class, 'show']);
    Route::get('/dashboard',  [Dashboard::class, 'show'])->name('dashboard');
    Route::get('/onboarding', OnboardingLayout::class)->name('onboarding');
});
