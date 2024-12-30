<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payments\PaystackPaymentController;
use App\Http\Kernel;

Route::prefix('payment')->name('payment.')->middleware(
    [
        Kernel::getAuthMiddleware(),
        Kernel::getAuthSessionMiddleware(),
        'onboarding',
        'intended'
    ]
)->group(function () {

    Route::get('/paystack/callback', [PaystackPaymentController::class, 'handleCallback'])->name('paystack.callback');
});
