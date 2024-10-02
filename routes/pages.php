<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DynamicPageController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\PoliciesPageController as Policy;

/**
 * Route for the home page.
 */
Route::get('/', [PageController::class, 'homeShow'])->name('home');

Route::prefix('policies')->group(function () {

    /**
     * Policy routes.
     */
    if (Policy::hasTermsAndPrivacyPolicyFeature()) {
        /**
         * Route for the terms page.
         */
        Route::get('/terms', [Policy::class, 'terms'])->name('terms.show');

        /**
         * Route for the privacy page.
         */
        Route::get('/policy', [Policy::class, 'privacy'])->name('privacy.show');
    }
    /**
     * Route for the cookie page.
     */
    Route::get('/cookie', [Policy::class, 'cookie'])->name('cookie.show');

});

/**
 * Dynamic page routes.
 * problematic as it doesn't handle well
 */
// Route::get('/{slug}', [DynamicPageController::class, 'show'])->where('slug', '.*');
