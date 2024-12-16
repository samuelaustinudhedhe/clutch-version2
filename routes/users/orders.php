<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Orders\Index;
use App\View\Livewire\User\Orders\Show;

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
         * Display the details of a specific  order.
         *
         * @uses App\View\Livewire\User\Bookings\Show
         * @param int|string $ order The ID or identifier of the  order to show
         * @return \Illuminate\View\View
         */
        Route::get('show/{order}', Show::class)->name('show');
    });
});
