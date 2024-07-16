<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for displaying the user's profile.
     */
    public function show(Request $request)
    {
        return view(
            'users.dashboard.profile.show',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's name.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's name.
     */
    public function nameShow(Request $request)
    {
        return view(
            'users.pages.profile.name',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    // ... other methods with similar documentation ...

    /**
     * Show the form for editing the user's date of birth.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's date of birth.
     */
    public function dateOfBirthShow(Request $request)
    {
        return view(
            'users.pages.profile.birthday',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }
}