<?php

/**
 * Admin Resource: Vehicles Management Routes
 *
 * This file defines the routes for managing vehicles in the admin panel, including listing, creating, editing, and showing vehicle details.
 * These routes are prefixed with 'vehicles' and named with 'vehicles.' prefix.
 * They are protected by middleware that checks for 'SuperAdmin' or 'Administrator' roles and 'manage_vehicles' permission.
 */

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Vehicles\Create as VehiclesCreate;
use App\View\Livewire\Admin\Resources\Vehicles\Wizard as VehiclesWizard;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Vehicles\Index as VehiclesIndex;
use App\View\Livewire\Admin\Resources\Vehicles\Show as VehiclesShow;

/**
 * Define the admin routes for vehicle management.
 *
 * This group of routes is responsible for handling vehicle management functionalities
 * such as listing vehicles, creating new vehicles, editing existing vehicles, and viewing vehicle details.
 * The routes are protected by middleware to ensure only authorized users can access them.
 */
Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    /**
     * Group of admin vehicles management routes
     *
     * This group of routes is specifically for managing vehicles.
     * It includes routes for listing, creating, editing, and showing vehicle details.
     * The routes are protected by role and permission middleware.
     *
     * Middleware:
     * @uses Kernel::role() Middleware to ensure the user has either 'SuperAdmin' or 'Administrator' role
     * @uses Kernel::permission() Middleware to check for 'manage_vehicles' permission
     */
    Route::prefix('vehicles')->name('vehicles.')->middleware(
        [
            Kernel::role(['SuperAdmin', 'Administrator'], 'admin'),
            Kernel::permission(['manage_vehicles'], 'admin')
        ]
    )->group(function () {

        /**
         * List all vehicles
         *
         * This route displays a list of all vehicles.
         * It uses a Livewire component to render the vehicle list dynamically.
         *
         * GET /admin/vehicles
         *
         * @uses VehiclesIndex Livewire component to display the list of vehicles
         * @return \Illuminate\View\View
         * @example Access the vehicles index via GET /admin/vehicles
         */
        Route::get('/', VehiclesIndex::class)->name('index');

        /**
         * Show create vehicle form
         *
         * This route displays a form for creating a new vehicle.
         * It uses a Livewire component to render the form dynamically.
         *
         * GET /admin/vehicles/create
         *
         * @uses VehiclesCreate Livewire component to display the create vehicle form
         * @return \Illuminate\View\View
         * @example Access the create vehicle form via GET /admin/vehicles/create
         */
        Route::get('create', VehiclesCreate::class)->name('create');

        /**
         * Show vehicle creation wizard
         *
         * This route displays a multi-step wizard for creating a new vehicle.
         * It uses a Livewire component to guide the user through the creation process.
         *
         * GET /admin/vehicles/wizard
         *
         * @uses VehiclesWizard Livewire component to display the vehicle creation wizard
         * @return \Illuminate\View\View
         * @example Access the vehicle creation wizard via GET /admin/vehicles/wizard
         */
        Route::get('wizard', VehiclesWizard::class)->name('wizard');

        /**
         * Show edit vehicle form
         *
         * This route displays a form for editing an existing vehicle.
         * It requires the ID of the vehicle to be edited as a parameter.
         * Note: This route currently uses the Show component, which might not be correct.
         * Consider creating a dedicated Edit component for editing vehicles.
         *
         * GET /admin/vehicles/edit/{vehicle}
         *
         * @uses VehiclesShow Livewire component to display the edit vehicle form
         * @param int $vehicle The ID of the vehicle to edit
         * @return \Illuminate\View\View
         * @example Access the edit vehicle form via GET /admin/vehicles/edit/{vehicle}
         */
        Route::get('edit/{vehicle}', VehiclesShow::class)->name('edit');

        /**
         * Show vehicle details
         *
         * This route displays the details of a specific vehicle.
         * It requires the ID of the vehicle to be shown as a parameter.
         * It uses a Livewire component to render the vehicle details dynamically.
         *
         * GET /admin/vehicles/show/{vehicle}
         *
         * @uses VehiclesShow Livewire component to display the vehicle details
         * @param int $vehicle The ID of the vehicle to show
         * @return \Illuminate\View\View
         * @example Access the vehicle details via GET /admin/vehicles/show/{vehicle}
         */
        Route::get('show/{vehicle}', VehiclesShow::class)->name('show');
    });
});

/**
 * Usage Examples:
 *
 * 1. Generate URL for vehicles index page:
 *    $vehiclesIndexUrl = route('vehicles.index');
 *
 * 2. Generate URL for creating a new vehicle:
 *    $createVehicleUrl = route('vehicles.create');
 *
 * 3. Generate URL for the vehicle creation wizard:
 *    $vehicleWizardUrl = route('vehicles.wizard');
 *
 * 4. Generate URL for editing a vehicle (assuming vehicle ID is 1):
 *    $editVehicleUrl = route('vehicles.edit', ['vehicle' => 1]);
 *
 * 5. Generate URL for showing a vehicle's details (assuming vehicle ID is 1):
 *    $showVehicleUrl = route('vehicles.show', ['vehicle' => 1]);
 *
 * 6. In Blade template, create a link to vehicles index:
 *    <a href="{{ route('vehicles.index') }}">Manage Vehicles</a>
 *
 * 7. In Blade template, create a form to edit a vehicle (assuming vehicle ID is stored in $vehicleId):
 *    <form method="GET" action="{{ route('vehicles.edit', ['vehicle' => $vehicleId]) }}">
 *        @csrf
 *        <button type="submit">Edit Vehicle</button>
 *    </form>
 *
 * 8. In Blade template, create a link to the vehicle creation wizard:
 *    <a href="{{ route('vehicles.wizard') }}">Create Vehicle (Wizard)</a>
 *
 * @note There are a few potential considerations in this route file:
 * 1. The edit route uses the Show component, which might not be correct.
 *    Consider creating a dedicated Edit component for editing vehicles.
 * 2. There's no route for deleting vehicles. If vehicle deletion is a required feature,
 *    consider adding a delete route with appropriate HTTP method (DELETE or POST).
 * 3. The 'wizard' route suggests a multi-step creation process. Ensure that this
 *    component is properly implemented to guide users through vehicle creation.
 */