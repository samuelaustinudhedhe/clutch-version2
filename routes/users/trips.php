<?php
use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Trips\Index;

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding' ])->group(function () {
    Route::prefix('trips')->name('trips.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('create', Index::class)->name('create');
        Route::get('edit/{trip}', Index::class)->name('edit');
        Route::get('show/{trip}', Index::class)->name('show');
    });
});
