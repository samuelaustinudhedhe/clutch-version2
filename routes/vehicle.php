<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DynamicPageController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\PoliciesPageController as Policy;
use App\View\Livewire\Guest\Vehicles\Index;
use App\View\Livewire\Guest\Vehicles\Show;

Route::prefix('vehicles')->name('vehicles.')->group(function () {
    Route::get('/', Index::class)->name('index');
    Route::get('vehicle/{car}', Show::class)->name('show');
});