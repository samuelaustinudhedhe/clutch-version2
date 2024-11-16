<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Orders\Index;
use App\View\Livewire\Admin\Resources\Orders\Show;

/**
 * Define routes for user  order management.
 *
 * This group of routes handles various aspects of user  order management,
 * including listing, creating, editing, and viewing  order details.
 *
 * @example
 * To access the  order list: GET / orders
 * To create a new  order: GET / orders/create
 * To edit a  order: GET / orders/edit/{ order}
 * To view a  order's details: GET / orders/show/{ order}
 *
 * @return void
 */
Route::prefix('orders')->name('orders.')->group(function () {
    /**
     * Display the list of user's  orders.
     *
     * @uses App\View\Livewire\User\Bookings\Index
     * @return \Illuminate\View\View
     */
    Route::get('/', Index::class)->name('index');
    
    /**
     * Display the form or interface to create a new  order.
     *
     * @uses App\View\Livewire\User\Bookings\Index
     * @return \Illuminate\View\View
     */
    //Route::get('create', Index::class)->name('create');

    /**
     * Display the form or interface to edit an existing  order.
     *
     * @uses App\View\Livewire\User\Bookings\Show
     * @param int|string $ order The ID or identifier of the  order to edit
     * @return \Illuminate\View\View
     */
    //Route::get('edit/{order}', Show::class)->name('edit');

    /**
     * Display the details of a specific  order.
     *
     * @uses App\View\Livewire\User\Bookings\Show
     * @param int|string $ order The ID or identifier of the  order to show
     * @return \Illuminate\View\View
     */
    Route::get('show/{order}', Show::class)->name('show');
});