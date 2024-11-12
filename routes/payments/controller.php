<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;

Route::prefix('payment')->name('payment.')->middleware(
    [
        Kernel::getAuthMiddleware(),
        Kernel::getAuthSessionMiddleware(),
        'onboarding',
        'intended'
    ]
)->group(function () {

    require_recursively(__DIR__ , maxDepth: 0, currentDepth: 0);
});
