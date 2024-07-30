<?php

use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::group(['middleware' => 'verified'], function () {
        if (Jetstream::hasApiFeatures()) {
            Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        }
    });
});