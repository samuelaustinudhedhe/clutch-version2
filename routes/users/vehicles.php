<?php

use App\Http\Kernel;
use App\View\Livewire\User\Vehicle\Create;
use App\View\Livewire\User\Vehicle\Edit;
use App\View\Livewire\User\Vehicle\Index;
use App\View\Livewire\User\Vehicle\Show;
use App\View\Livewire\User\Vehicle\Wizard;
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
     * Define routes for vehicle management.
     *
     * This group of routes handles various aspects of vehicle management for users,
     * including listing, creating, editing, and viewing vehicle details.
     *
     * @example
     * To access the vehicle list: GET /vehicles
     * To create a new vehicle: GET /vehicles/create
     * To edit a vehicle: GET /vehicles/edit/{vehicle}
     * To view a vehicle's details: GET /vehicles/show/{vehicle}
     *
     * @return void
     */
    Route::prefix('vehicles')->name('vehicles.')->group(function () {
        /**
         * Display the list of user's vehicles.
         *
         * @uses App\View\Livewire\User\Vehicle\Index
         * @return \Illuminate\View\View
         */
        Route::get('/', Index::class)->name('index');

        /**
         * Display the form to create a new vehicle.
         *
         * @uses App\View\Livewire\User\Vehicle\Create
         * @return \Illuminate\View\View
         */
        Route::get('create', Create::class)->name('create');

        /**
         * Display the wizard for creating a vehicle.
         * This is likely a multi-step form for vehicle creation.
         *
         * @uses App\View\Livewire\User\Vehicle\Wizard
         * @return \Illuminate\View\View
         */
        Route::get('wizard', Wizard::class)->name('wizard');

        /**
         * Display the form to edit an existing vehicle.
         *
         * @uses App\View\Livewire\User\Vehicle\Edit
         * @param int|string $vehicle The ID or slug of the vehicle to edit
         * @return \Illuminate\View\View
         */
        Route::get('edit/{vehicle}', Edit::class)->name('edit');

        /**
         * Display the details of a specific vehicle.
         *
         * @uses App\View\Livewire\User\Vehicle\Show
         * @param int|string $vehicle The ID or slug of the vehicle to show
         * @return \Illuminate\View\View
         */
        Route::get('show/{vehicle}', Show::class)->name('show');
    });
});
