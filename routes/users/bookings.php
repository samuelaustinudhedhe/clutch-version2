<?php

use App\Http\Kernel;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\User\Bookings\Index;
use App\View\Livewire\User\Bookings\Show;

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
     * Define routes for user booking management.
     *
     * This group of routes handles various aspects of user booking management,
     * including listing, creating, editing, and viewing booking details.
     *
     * @example
     * To access the booking list: GET /user/bookings
     * To create a new booking: GET /user/bookings/create
     * To edit a booking: GET /user/bookings/edit/{booking}
     * To view a booking's details: GET /user/bookings/show/{booking}
     *
     * @return void
     */
    Route::prefix('bookings')->name('bookings.')->group(function () {
        /**
         * Display the list of user's bookings.
         *
         * This route provides a view of all bookings made by the user.
         * It uses a Livewire component to dynamically display the booking list.
         *
         * @uses App\View\Livewire\User\Bookings\Index
         * @return \Illuminate\View\View
         * @example Accessing '/user/bookings' will display the list of bookings.
         */
        Route::get('/', Index::class)->name('index');

        /**
         * Display the form or interface to create a new booking.
         *
         * This route provides a form for users to create new bookings.
         * It uses the same Livewire component as the booking list, which may handle both listing and creation.
         *
         * @uses App\View\Livewire\User\Bookings\Index
         * @return \Illuminate\View\View
         * @example Accessing '/user/bookings/create' will display the booking creation form.
         */
        Route::get('create', Index::class)->name('create');

        /**
         * Display the form or interface to edit an existing booking.
         *
         * This route allows users to edit details of an existing booking.
         * It uses a Livewire component to dynamically handle the editing process.
         *
         * @uses App\View\Livewire\User\Bookings\Show
         * @param int|string $booking The ID or identifier of the booking to edit
         * @return \Illuminate\View\View
         * @example Accessing '/user/bookings/edit/1' will display the edit form for booking with ID 1.
         */
        Route::get('edit/{booking}', Show::class)->name('edit');

        /**
         * Display the details of a specific booking.
         *
         * This route provides a detailed view of a specific booking.
         * It uses a Livewire component to dynamically display booking details.
         *
         * @uses App\View\Livewire\User\Bookings\Show
         * @param int|string $booking The ID or identifier of the booking to show
         * @return \Illuminate\View\View
         * @example Accessing '/user/bookings/show/1' will display details for booking with ID 1.
         */
        Route::get('show/{booking}', Show::class)->name('show');
    });
});