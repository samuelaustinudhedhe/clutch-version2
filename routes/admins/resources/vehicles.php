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
 * Group of admin vehicles management routes
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
     * GET /admin/vehicles
     *
     * @uses VehiclesIndex Livewire component to display the list of vehicles
     */
    Route::get('/', VehiclesIndex::class)->name('index');

    /**
     * Show create vehicle form
     *
     * GET /admin/vehicles/create
     *
     * @uses VehiclesCreate Livewire component to display the create vehicle form
     */
    Route::get('create', VehiclesCreate::class)->name('create');

    /**
     * Show vehicle creation wizard
     *
     * GET /admin/vehicles/wizard
     *
     * @uses VehiclesWizard Livewire component to display the vehicle creation wizard
     */
    Route::get('wizard', VehiclesWizard::class)->name('wizard');

    /**
     * Show edit vehicle form
     *
     * GET /admin/vehicles/edit/{vehicle}
     *
     * @uses VehiclesShow Livewire component to display the edit vehicle form
     * @param int $vehicle The ID of the vehicle to edit
     * @note This route uses the Show component, which might be incorrect. Consider creating an Edit component.
     */
    Route::get('edit/{vehicle}', VehiclesShow::class)->name('edit');

    /**
     * Show vehicle details
     *
     * GET /admin/vehicles/show/{vehicle}
     *
     * @uses VehiclesShow Livewire component to display the vehicle details
     * @param int $vehicle The ID of the vehicle to show
     */
    Route::get('show/{vehicle}', VehiclesShow::class)->name('show');
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
