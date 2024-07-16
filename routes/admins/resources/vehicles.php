<?php

use App\Http\Kernel;
use App\View\Livewire\Admin\Resources\Vehicles\Create as VehiclesCreate;
use Illuminate\Support\Facades\Route;
use App\View\Livewire\Admin\Resources\Vehicles\Index as VehiclesIndex;

Route::prefix(app_admin_url())->name('admin.')->middleware(Kernel::adminAuthMiddleware())->group(function () {

    Route::prefix('vehicles')->name('vehicles.')->middleware([Kernel::role(['SuperAdmin', 'Administrator']), Kernel::permission(['manage_users'])])->group(function () {
        Route::get('/', VehiclesIndex::class)->name('index');
        Route::get('create',  VehiclesCreate::class)->name('create');
        Route::get('edit/{role}', VehiclesIndex::class)->name('edit');
        Route::get('show/{role}', VehiclesIndex::class)->name('show');
    });
});
