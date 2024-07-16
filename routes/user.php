<?php

use App\Http\Controllers\Pages\DynamicPageController;
use App\Http\Controllers\User\Dashboard\UserDashboardController as Dashboard;
use App\Http\Controllers\User\Profile\UserProfileController as UserProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Jetstream\Jetstream;


Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {

    // Routes for Users
    Route::redirect('/dashboard', '/user/dashboard');
    Route::prefix('user')->name('user.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

        //Put all Auth protected users routes here
        Route::get('/dashboard',  [Dashboard::class, 'show'])->name('dashboard');

        Route::group(['middleware' => array_values(array_filter(
            [
                Dashboard::$authMiddleware,
                Dashboard::$authSessionMiddleware
            ]
        ))], function () {

            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/',  [UserProfileController::class, 'show'])->name('show');
                Route::get('/picture', [UserProfileController::class, 'editShow'])->name('picture');


                Route::get('/name', [UserProfileController::class, 'showName'])->name('name');

                // Route::post('name', function (Request $request, UpdateUserProfileInformation $action) {

                //     $action->update($request->user(), $request->all());
                //     return redirect()->route('user.profile.name')->with('status', 'First name updated successfully.');
                // })->name('name.update');


                Route::get('/birthday', [UserProfileController::class, 'dateOfBirthShow'])->name('birthday');
                Route::get('/gender', [UserProfileController::class, 'show'])->name('gender');
                Route::get('/email', [UserProfileController::class, 'show'])->name('email');
                Route::get('/phone', [UserProfileController::class, 'show'])->name('phone');
                Route::get('/address', [UserProfileController::class, 'show'])->name('address');

                //Route::put('/{user}', [UserProfileController::class, 'update'])->name('update');

                Route::get('/edit', [UserProfileController::class, 'show'])->name('edit');
                Route::get('/update', [UserProfileController::class, 'show'])->name('update');
                Route::get('/delete', [UserProfileController::class, 'deleteShow'])->name('delete');
                Route::get('/password', [UserProfileController::class, 'passwordShow'])->name('password');
                Route::get('/2af',  [UserProfileController::class, 'authenticationShow'])->name('2af');
            });

            Route::group(['middleware' => 'verified'], function () {
                // API...
                if (Jetstream::hasApiFeatures()) {
                    Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
                }

                // Teams...
                if (Jetstream::hasTeamFeatures()) {
                    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                    Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');

                    Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
                        ->middleware(['signed'])
                        ->name('team-invitations.accept');
                }
            });
        });

        // Dynamic Pages 
        Route::get('/user/{slug}', [DynamicPageController::class, 'show'])->where('slug', '.*');
    });
});
