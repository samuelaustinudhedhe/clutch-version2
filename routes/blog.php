<?php

use App\Http\Controllers\Pages\BlogPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PageController;


/**
 * Dynamic page routes.
 * problematic as it doesn't handle well
 */
Route::prefix('blog')->name('blog')->group(function () {

    Route::get('/', [BlogPageController::class, 'index'])->name('');
    route::get('/', [BlogPageController::class, 'contactShow'])->name('.index');

});
