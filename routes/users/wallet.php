<?php

use App\Http\Kernel;
use App\View\Livewire\User\Wallet\Transactions;
use App\View\Livewire\User\Wallet\Deposit;
use App\View\Livewire\User\Wallet\Show;
use Illuminate\Support\Facades\Route;

/**
 * User Route Group
 *
 * This group applies common configurations to all user routes:
 * - Prefix: All routes are prefixed with 'user'
 * - Name: All route names are prefixed with 'user.'
 * - Middleware: Applies multiple middleware for authentication and verification
 *
 * @uses Laravel\Sanctum\HasApiTokens
 * @uses Laravel\Jetstream\Jetstream
 * @uses Illuminate\Support\Facades\Route
 *
 * Middleware applied:
 * - auth:sanctum: Ensures the user is authenticated using Laravel Sanctum
 * - config('jetstream.auth_session'): Applies the authentication session middleware configured in Jetstream
 * - verified: Ensures the user's email is verified (if using email verification)
 *
 * @example A route defined as 'profile' within this group would be accessible at '/user/profile'
 *          and would have the name 'user.profile'
 */
Route::prefix('user')->name('user.')->middleware(
    [
        Kernel::getAuthMiddleware(),
        Kernel::getAuthSessionMiddleware(),
        'onboarding',
        'intended'
    ]
)->group(function () {
    /**
     * Define routes for user wallet management.
     *
     * This group of routes handles various aspects of user wallet management,
     * including listing, creating, editing, and viewing wallet details.
     *
     * @example
     * To access the wallet list: GET /wallet
     * To edit a wallet: GET /wallet/edit/{wallet}
     * To view a wallet's details: GET /wallet/show/{wallet}
     *
     * @return void
     */
    Route::prefix('wallet')->name('wallet.')->group(function () {
        /**
         * Display the list of user's wallets.
         *
         * @uses App\View\Livewire\User\Wallet\Index
         * @return \Illuminate\View\View
         */
        //Route::get('/', Show::class)->name('Show');


        /**
         * Display the form to edit an existing wallet.
         *
         * @uses App\View\Livewire\User\Wallet\Edit
         * @param int|string $wallet The ID or identifier of the wallet to edit
         * @return \Illuminate\View\View
         */
        //Route::get('/transactions', Transactions::class)->name('transactions');

        /**
         * Display the details of a specific wallet.
         *
         * @uses App\View\Livewire\User\Wallet\Show
         * @param int|string $wallet The ID or identifier of the wallet to show
         * @return \Illuminate\View\View
         */
        //Route::get('/deposit', Deposit::class)->name('Deposit');
    });
});
