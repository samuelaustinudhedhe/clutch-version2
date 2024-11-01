<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile\UserProfileController as UserProfileController;
use App\View\Livewire\User\Profile\DateOfBirth;
use App\View\Livewire\User\Profile\Email;
use App\View\Livewire\User\Profile\Gender;
use App\View\Livewire\User\Profile\Name;
use App\View\Livewire\User\Profile\Photo;
use App\View\Livewire\User\Profile\Show;

/**
 * Define routes for user profile management.
 *
 * This group of routes handles various aspects of user profile management,
 * including viewing and editing personal information, security settings,
 * and account management.
 *
 * @example
 * To access the main profile page: GET /profile
 * To access the profile picture page: GET /profile/picture
 *
 * @return void
 */
Route::prefix('profile')->name('profile.')->group(function () {
    /**
     * Display the main profile page.
     *
     * @uses App\View\Livewire\User\Profile\Show
     * @return \Illuminate\View\View
     */
    Route::get('/',  Show::class)->name('show');

    /**
     * Display the profile picture page.
     *
     * @uses App\View\Livewire\User\Profile\Photo
     * @return \Illuminate\View\View
     */
    Route::get('/picture', [Photo::class])->name('photo');

    /**
     * Display the page for editing user's name.
     *
     * @uses App\View\Livewire\User\Profile\Name
     * @return \Illuminate\View\View
     */
    Route::get('/name', Name::class)->name('name');

    /**
     * Display the page for editing user's date of birth.
     *
     * @uses App\View\Livewire\User\Profile\DateOfBirth
     * @return \Illuminate\View\View
     */
    Route::get('/birthday', DateOfBirth::class)->name('birthday');

    /**
     * Display the page for editing user's gender.
     *
     * @uses App\View\Livewire\User\Profile\Gender
     * @return \Illuminate\View\View
     */
    Route::get('/gender', Gender::class)->name('gender');

    /**
     * Display the page for editing user's email.
     *
     * @uses App\View\Livewire\User\Profile\Email
     * @return \Illuminate\View\View
     */
    Route::get('/email', Email::class)->name('email');

    /**
     * Display the page for editing user's phone number.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::phoneShow()
     * @return \Illuminate\View\View
     */
    Route::get('/phone', [UserProfileController::class, 'phoneShow'])->name('phone');

    /**
     * Display the page for editing user's address.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::addressShow()
     * @return \Illuminate\View\View
     */
    Route::get('/address', [UserProfileController::class, 'addressShow'])->name('address');

    /**
     * Display the general profile edit page.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::show()
     * @return \Illuminate\View\View
     */
    Route::get('/edit', [UserProfileController::class, 'show'])->name('edit');

    /**
     * Display the profile update page.
     * Note: This route seems to use the same method as the edit route.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::show()
     * @return \Illuminate\View\View
     */
    Route::get('/update', [UserProfileController::class, 'show'])->name('update');

    /**
     * Display the account deletion page.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::deleteShow()
     * @return \Illuminate\View\View
     */
    Route::get('/delete', [UserProfileController::class, 'deleteShow'])->name('delete');

    /**
     * Display the password change page.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::passwordShow()
     * @return \Illuminate\View\View
     */
    Route::get('/password', [UserProfileController::class, 'passwordShow'])->name('password');

    /**
     * Display the two-factor authentication settings page.
     *
     * @uses App\Http\Controllers\User\Profile\UserProfileController::twoAFShow()
     * @return \Illuminate\View\View
     */
    Route::get('/2af',  [UserProfileController::class, 'twoAFShow'])->name('2af');
});