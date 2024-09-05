<?php

use Illuminate\Support\Facades\Route;
use App\View\Livewire\Guest\Vehicles\Index;
use App\View\Livewire\Guest\Vehicles\Show;

Route::prefix('vehicles')->name('vehicles.')->group(function () {
    Route::get('/', Index::class)->name('index');
    Route::get('/{vehicle}', Show::class)->name('show');
});