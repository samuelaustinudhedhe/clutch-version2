<?php

use App\View\Livewire\Book\Trip;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Book\Trip as BookTrip;

Route::prefix('checkout')->name('checkout.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding'])->group(function () {
    Route::get('/{vehicle}', Trip::class)->name('show');
    Route::get('/{vehicle}/callback', BookTrip::class)->name('callback');    
});
