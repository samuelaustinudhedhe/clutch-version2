<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DynamicPageController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\PoliciesPageController as Policy;


Route::prefix('cars')->name('cars.')->group(function () {
    Route::get('/', [PageController::class, 'carsShow'])->name('index');
    Route::get('car/{car}', [PageController::class, 'carShow'])->name('show');
});