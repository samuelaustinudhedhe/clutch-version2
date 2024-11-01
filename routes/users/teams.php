<?php

use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

/**
 * Define routes for team management using Laravel Jetstream.
 *
 * These routes handle team creation, viewing, updating, and invitation acceptance.
 * They are grouped under the 'verified' middleware to ensure only verified users can access them.
 *
 * @uses Laravel\Jetstream\Jetstream
 * @uses Laravel\Jetstream\Http\Controllers\CurrentTeamController
 * @uses Laravel\Jetstream\Http\Controllers\Livewire\TeamController
 * @uses Laravel\Jetstream\Http\Controllers\TeamInvitationController
 */
Route::group(['middleware' => 'verified'], function () {
    /**
     * Check if team features are enabled in Jetstream configuration.
     *
     * @return void
     */
    if (Jetstream::hasTeamFeatures()) {
        /**
         * Display the team creation form.
         *
         * @uses Laravel\Jetstream\Http\Controllers\Livewire\TeamController::create
         * @return \Illuminate\View\View
         *
         * @example GET /teams/create
         */
        Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

        /**
         * Display a specific team's details.
         *
         * @uses Laravel\Jetstream\Http\Controllers\Livewire\TeamController::show
         * @param int|string $team The ID or slug of the team to show
         * @return \Illuminate\View\View
         *
         * @example GET /teams/1 or GET /teams/my-team
         */
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

        /**
         * Update the user's current team.
         *
         * @uses Laravel\Jetstream\Http\Controllers\CurrentTeamController::update
         * @return \Illuminate\Http\RedirectResponse
         *
         * @example PUT /current-team
         */
        Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');

        /**
         * Accept a team invitation.
         *
         * This route is signed to ensure the invitation link is valid and hasn't been tampered with.
         *
         * @uses Laravel\Jetstream\Http\Controllers\TeamInvitationController::accept
         * @param string $invitation The invitation token
         * @return \Illuminate\Http\RedirectResponse
         *
         * @example GET /team-invitations/abc123...
         */
        Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
            ->middleware(['signed'])
            ->name('team-invitations.accept');
    }
});