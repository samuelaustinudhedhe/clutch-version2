<?php

use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

/**
 * Define routes for API token management using Laravel Jetstream.
 *
 * These routes handle the display of user's API tokens. They are grouped under
 * the 'verified' middleware to ensure only verified users can access them.
 *
 * @uses Laravel\Jetstream\Jetstream
 * @uses Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController
 */
Route::group(['middleware' => 'verified'], function () {
    /**
     * Check if API features are enabled in Jetstream configuration.
     *
     * @return void
     */
    if (Jetstream::hasApiFeatures()) {
        /**
         * Display the user's API tokens.
         *
         * This route will show a list of the authenticated user's API tokens,
         * allowing them to manage (create, delete, update permissions) their tokens.
         *
         * @uses Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController::index
         * @return \Illuminate\View\View
         *
         * @example GET /user/api-tokens
         */
        Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
    }
});