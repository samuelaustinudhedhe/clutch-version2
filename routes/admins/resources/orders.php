<?php

/**
 * Admin Resource: Orders Management Routes
 *
 * This file defines the routes for managing orders in the admin panel.
 * It sets up the necessary routes for CRUD (Create, Read, Update, Delete) operations on orders.
 * The routes use Livewire components for handling both the logic and views, providing a dynamic user interface.
 * These routes are protected by middleware to ensure only authorized users with the appropriate roles and orders can access them.
 */

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Orders\Index;
use App\View\Livewire\Admin\Resources\Orders\Show;

/**
 * Admin Resource: Order Management Routes
 *
 * This file defines the routes for managing orders in the admin panel of the application.
 * It uses Livewire components to handle the operations for viewing and managing orders.
 * The routes are protected by authentication middleware to ensure only authorized users can access them.
 *
 * @uses Illuminate\Support\Facades\Route
 * @uses App\View\Livewire\Admin\Resources\Orders\Index
 * @uses App\View\Livewire\Admin\Resources\Orders\Show
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Define routes for order management.
     *
     * This group of routes handles various aspects of order management,
     * including listing and viewing order details.
     *
     * @example
     * To access the order list: GET /admin/orders
     * To view an order's details: GET /admin/orders/show/{order}
     *
     * @return void
     */
    Route::prefix('orders')->name('orders.')->group(function () {
        /**
         * Display the list of orders.
         *
         * This route uses a Livewire component to render a list of all orders.
         * It is accessible only to users with the appropriate permissions.
         *
         * @uses App\View\Livewire\Admin\Resources\Orders\Index
         * @return \Illuminate\View\View
         * @example Access the order index via GET /admin/orders
         */
        Route::get('/', Index::class)->name('index');

        /**
         * Display the form or interface to create a new order.
         *
         * This route is intended to use a Livewire component to render a form for creating a new order.
         * It is currently commented out, indicating it may be under development or not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Orders\Index
         * @return \Illuminate\View\View
         * @example Access the create form via GET /admin/orders/create
         */
        //Route::get('create', Index::class)->name('create');

        /**
         * Display the form or interface to edit an existing order.
         *
         * This route is intended to use a Livewire component to render a form for editing an existing order.
         * It requires the ID or identifier of the order to be edited as a parameter.
         * It is currently commented out, indicating it may be under development or not in use.
         *
         * @uses App\View\Livewire\Admin\Resources\Orders\Show
         * @param int|string $order The ID or identifier of the order to edit
         * @return \Illuminate\View\View
         * @example Access the edit form via GET /admin/orders/edit/{order}
         */
        //Route::get('edit/{order}', Show::class)->name('edit');

        /**
         * Display the details of a specific order.
         *
         * This route uses a Livewire component to render the details of a specific order.
         * It requires the ID or identifier of the order to be displayed as a parameter.
         *
         * @uses App\View\Livewire\Admin\Resources\Orders\Show
         * @param int|string $order The ID or identifier of the order to show
         * @return \Illuminate\View\View
         * @example Access the show page via GET /admin/orders/show/{order}
         */
        Route::get('show/{order}', Show::class)->name('show');
    });
});