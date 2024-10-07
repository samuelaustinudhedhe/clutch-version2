<?php

use App\Http\Kernel;
use App\View\Livewire\User\Vehicle\Create;
use App\View\Livewire\User\Vehicle\Edit;
use App\View\Livewire\User\Vehicle\Index;
use App\View\Livewire\User\Vehicle\Show;
use App\View\Livewire\User\Vehicle\Wizard;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding',Kernel::permission(['add_vehicles'],'web') ])->group(function () {
    Route::prefix('vehicles')->name('vehicles.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::get('wizard', Wizard::class)->name('wizard');
        Route::get('edit/{vehicle}', Edit::class)->name('edit');
        Route::get('show/{vehicle}', Show::class)->name('show'); 
    });
});
