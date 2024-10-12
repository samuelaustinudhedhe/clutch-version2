<?php

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Vehicles\Create as VehiclesCreate;
use App\View\Livewire\Admin\Resources\Vehicles\Wizard as VehiclesWizard;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Vehicles\Index as VehiclesIndex;
use App\View\Livewire\Admin\Resources\Vehicles\Show as VehiclesShow;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('vehicles')->name('vehicles.')->middleware([Kernel::role(['SuperAdmin', 'Administrator'],'admin'), Kernel::permission(['manage_vehicles'],'admin')])->group(function () {
        Route::get('/', VehiclesIndex::class)->name('index');
        Route::get('create',  VehiclesCreate::class)->name('create');
        Route::get('wizard',  VehiclesWizard::class)->name('wizard');
        Route::get('edit/{vehicle}', VehiclesShow::class)->name('edit');
        Route::get('show/{vehicle}', VehiclesShow::class)->name('show');
    });
});
