<?php

use App\View\Livewire\User\Wallet\Transactions;
use App\View\Livewire\User\Wallet\Deposit;
use App\View\Livewire\User\Wallet\Show;
use Illuminate\Support\Facades\Route;

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