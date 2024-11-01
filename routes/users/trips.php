<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Trips\Index;

/**
 * Define routes for user trip management.
 *
 * This group of routes handles various aspects of user trip management,
 * including listing, creating, editing, and viewing trip details.
 * Note that all routes currently use the same Index component, which
 * suggests that trip management might be handled through a single
 * dynamic interface.
 *
 * @example
 * To access the trip list: GET /trips
 * To create a new trip: GET /trips/create
 * To edit a trip: GET /trips/edit/{trip}
 * To view a trip's details: GET /trips/show/{trip}
 *
 * @return void
 */
Route::prefix('trips')->name('trips.')->group(function () {
    /**
     * Display the list of user's trips.
     *
     * @uses App\View\Livewire\User\Trips\Index
     * @return \Illuminate\View\View
     */
    Route::get('/', Index::class)->name('index');

    /**
     * Display the form or interface to create a new trip.
     * Note: This route uses the same Index component as the list view.
     *
     * @uses App\View\Livewire\User\Trips\Index
     * @return \Illuminate\View\View
     */
    Route::get('create', Index::class)->name('create');

    /**
     * Display the form or interface to edit an existing trip.
     * Note: This route uses the same Index component as the list view.
     *
     * @uses App\View\Livewire\User\Trips\Index
     * @param int|string $trip The ID or identifier of the trip to edit
     * @return \Illuminate\View\View
     */
    Route::get('edit/{trip}', Index::class)->name('edit');

    /**
     * Display the details of a specific trip.
     * Note: This route uses the same Index component as the list view.
     *
     * @uses App\View\Livewire\User\Trips\Index
     * @param int|string $trip The ID or identifier of the trip to show
     * @return \Illuminate\View\View
     */
    Route::get('show/{trip}', Index::class)->name('show');
});