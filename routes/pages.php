<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DynamicPageController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\PoliciesPageController as Policy;

/**
 * Route for the home page.
 */
Route::get('/', [PageController::class, 'homeShow'])->name('home');

Route::prefix('policies')->name('policies.')->group(function () {

    /**
     * Policy routes.
     */
    if (Policy::hasTermsAndPrivacyPolicyFeature()) {
        /**
         * Route for the terms page.
         */
        Route::get('/terms', [Policy::class, 'terms'])->name('terms');

        /**
         * Route for the privacy page.
         */
        Route::get('/privacy', [Policy::class, 'privacy'])->name('privacy');
    }
    /**
     * Route for the cookie page.
     */
    Route::get('/cookie', [Policy::class, 'cookie'])->name('cookie');
    Route::get('/guidelines', [Policy::class, 'guidelines'])->name('guidelines');

});

/**
 * Dynamic page routes.
 * problematic as it doesn't handle well
 */
Route::prefix('pages')->name('pages.')->group(function () {

    route::get('/contact', [PageController::class, 'contactShow'])->name('contact');
    Route::get('/about', [PageController::class, 'aboutShow'])->name('about');

});
