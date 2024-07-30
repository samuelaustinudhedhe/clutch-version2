<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile\UserProfileController as UserProfileController;
use App\View\Livewire\User\Profile\Show;

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'onboarding',])->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',  Show::class)->name('show');
        Route::get('/picture', [UserProfileController::class, 'editShow'])->name('picture');
        Route::get('/name', [UserProfileController::class, 'showName'])->name('name');
        Route::get('/birthday', [UserProfileController::class, 'dateOfBirthShow'])->name('birthday');
        Route::get('/gender', [UserProfileController::class, 'show'])->name('gender');
        Route::get('/email', [UserProfileController::class, 'show'])->name('email');
        Route::get('/phone', [UserProfileController::class, 'show'])->name('phone');
        Route::get('/address', [UserProfileController::class, 'show'])->name('address');
        Route::get('/edit', [UserProfileController::class, 'show'])->name('edit');
        Route::get('/update', [UserProfileController::class, 'show'])->name('update');
        Route::get('/delete', [UserProfileController::class, 'deleteShow'])->name('delete');
        Route::get('/password', [UserProfileController::class, 'passwordShow'])->name('password');
        Route::get('/2af',  [UserProfileController::class, 'authenticationShow'])->name('2af');
    });
});