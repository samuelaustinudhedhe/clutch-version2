<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payments\PaystackPaymentController;

Route::get('/paystack/callback', [PaystackPaymentController::class, 'handleCallback'])->name('paystack.callback');