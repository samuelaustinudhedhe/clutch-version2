<?php

use App\View\Livewire\Book\Trip;
use Illuminate\Support\Facades\Route;

Route::prefix('checkout')->name('checkout.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding'])->group(function () {
    Route::get('/{vehicle}', Trip::class)->name('show');    
});