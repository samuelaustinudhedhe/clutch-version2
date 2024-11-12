<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Bookings\Index;
use App\View\Livewire\User\Bookings\Show;

/**
 * Define routes for user booking management.
 *
 * This group of routes handles various aspects of user booking management,
 * including listing, creating, editing, and viewing booking details.
 *
 * @example
 * To access the booking list: GET /bookings
 * To create a new booking: GET /bookings/create
 * To edit a booking: GET /bookings/edit/{booking}
 * To view a booking's details: GET /bookings/show/{booking}
 *
 * @return void
 */
Route::prefix('bookings')->name('bookings.')->group(function () {
    /**
     * Display the list of user's bookings.
     *
     * @uses App\View\Livewire\User\Bookings\Index
     * @return \Illuminate\View\View
     */
    Route::get('/', Index::class)->name('index');

    /**
     * Display the form or interface to create a new booking.
     *
     * @uses App\View\Livewire\User\Bookings\Index
     * @return \Illuminate\View\View
     */
    Route::get('create', Index::class)->name('create');

    /**
     * Display the form or interface to edit an existing booking.
     *
     * @uses App\View\Livewire\User\Bookings\Show
     * @param int|string $booking The ID or identifier of the booking to edit
     * @return \Illuminate\View\View
     */
    Route::get('edit/{booking}', Show::class)->name('edit');

    /**
     * Display the details of a specific booking.
     *
     * @uses App\View\Livewire\User\Bookings\Show
     * @param int|string $booking The ID or identifier of the booking to show
     * @return \Illuminate\View\View
     */
    Route::get('show/{booking}', Show::class)->name('show');
});