<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile\UserProfileController as UserProfileController;
use App\View\Livewire\User\Profile\DateOfBirth;
use App\View\Livewire\User\Profile\Email;
use App\View\Livewire\User\Profile\Gender;
use App\View\Livewire\User\Profile\Name;
use App\View\Livewire\User\Profile\Show;

Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',  Show::class);
        Route::get('/',  Show::class)->name('show');

        Route::get('/picture', [UserProfileController::class, 'editShow'])->name('picture');
        Route::get('/name', Name::class)->name('name');
        Route::get('/birthday', DateOfBirth::class)->name('birthday');
        Route::get('/gender', Gender::class)->name('gender');
        Route::get('/email', Email::class)->name('email');
        Route::get('/phone', [UserProfileController::class, 'phoneShow'])->name('phone');
        Route::get('/address', [UserProfileController::class, 'addressShow'])->name('address');
        
        Route::get('/edit', [UserProfileController::class, 'show'])->name('edit');
        Route::get('/update', [UserProfileController::class, 'show'])->name('update');
        Route::get('/delete', [UserProfileController::class, 'deleteShow'])->name('delete');

        Route::get('/password', [UserProfileController::class, 'passwordShow'])->name('password');

        Route::get('/2af',  [UserProfileController::class, 'twoAFShow'])->name('2af');
    });
});