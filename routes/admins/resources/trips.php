<?php

/**
 * Admin Resource: Trips Management Routes
 *
 * This file defines the routes for managing trips in the admin panel.
 * It sets up the necessary routes for CRUD (Create, Read, Update, Delete) operations on trips.
 * The routes use Livewire components for handling both the logic and views, providing a dynamic user interface.
 * These routes are protected by middleware to ensure only authorized users with the appropriate roles and trips can access them.
 */

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Trips\Index;
use App\View\Livewire\Admin\Resources\Trips\Show;
use App\View\Livewire\Admin\Resources\Trips\Orders;

/**
 * Admin Resource: Trips Management Routes
 *
 * This file defines the routes for managing user trips, including listing, viewing, and managing trip orders.
 * These routes are prefixed with 'trips' and named with 'trips.' prefix.
 * They are protected by middleware that ensures the user is authenticated as an admin.
 * The routes utilize Livewire components to provide a dynamic and interactive user interface.
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Define routes for user trip management.
     *
     * This group of routes handles various aspects of user trip management,
     * including listing, creating, editing, and viewing trip details.
     * The routes are organized under the 'trips' prefix and are named with the 'trips.' prefix.
     *
     * Middleware:
     * @uses Kernel::adminAuthMiddleware Middleware to ensure the user is authenticated as an admin
     *
     * @example Accessing the trip list: GET /admin/trips
     * @example Viewing a trip's details: GET /admin/trips/show/{trip}
     * @example Viewing a trip's order details: GET /admin/trips/orders/{trip}
     *
     * @return void
     */
    Route::prefix('trips')->name('trips.')->group(function () {

        /**
         * Display the list of user's trips.
         *
         * This route uses a Livewire component to render a list of all trips.
         * It is accessible only to users with the appropriate admin authentication.
         *
         * @uses App\View\Livewire\Admin\Resources\Trips\Index Livewire component to display the list of trips
         * @return \Illuminate\View\View
         * @example Access the trips index via GET /admin/trips
         */
        Route::get('/', Index::class)->name('index');

        /**
         * Display the form or interface to create a new trip.
         *
         * This route is intended to use a Livewire component to render a form for creating a new trip.
         * It is currently commented out and not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Trips\Index Livewire component to display the create trip form
         * @return \Illuminate\View\View
         * @example Access the create form via GET /admin/trips/create (currently not active)
         */
        // Route::get('create', Index::class)->name('create');

        /**
         * Display the form or interface to edit an existing trip.
         *
         * This route is intended to use a Livewire component to render a form for editing an existing trip.
         * It requires the ID or identifier of the trip to be edited as a parameter.
         * It is currently commented out and not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Trips\Show Livewire component to display the edit trip form
         * @param int|string $trip The ID or identifier of the trip to edit
         * @return \Illuminate\View\View
         * @example Access the edit form via GET /admin/trips/edit/{trip} (currently not active)
         */
        // Route::get('edit/{trip}', Show::class)->name('edit');

        /**
         * Display the details of a specific trip.
         *
         * This route uses a Livewire component to render the details of a specific trip.
         * It requires the ID or identifier of the trip to be displayed as a parameter.
         * It is accessible only to users with the appropriate admin authentication.
         *
         * @uses App\View\Livewire\Admin\Resources\Trips\Show Livewire component to display the trip details
         * @param int|string $trip The ID or identifier of the trip to show
         * @return \Illuminate\View\View
         * @example Access the show page via GET /admin/trips/show/{trip}
         */
        Route::get('show/{trip}', Show::class)->name('show');

        /**
         * Display the order details of a specific trip.
         *
         * This route uses a Livewire component to render the order details of a specific trip.
         * It requires the ID or identifier of the trip to be displayed as a parameter.
         * It is accessible only to users with the appropriate admin authentication.
         *
         * @uses App\View\Livewire\Admin\Resources\Trips\Orders Livewire component to display the trip order details
         * @param int|string $trip The ID or identifier of the trip to show
         * @return \Illuminate\View\View
         * @example Access the orders page via GET /admin/trips/orders/{trip}
         */
        Route::get('orders/{trip}', Orders::class)->name('orders');
    });
});