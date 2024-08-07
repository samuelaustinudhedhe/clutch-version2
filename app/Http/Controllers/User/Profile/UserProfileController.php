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
            'user.profile.show',
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
            'user.profile.name',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Show the form for editing the user's date of birth.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's date of birth.
     */
    public function dateOfBirthShow(Request $request)
    {
        return view(
            'user.profile.birthday',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's profile picture.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's profile picture.
     */
    public function editShow(Request $request)
    {
        return view(
            'user.profile.picture',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's gender.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's gender.
     */
    public function genderShow(Request $request)
    {
        return view(
            'user.profile.gender',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's email.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's email.
     */
    public function emailShow(Request $request)
    {
        return view(
            'user.profile.email',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's phone number.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's phone number.
     */
    public function phoneShow(Request $request)
    {
        return view(
            'user.profile.phone',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for editing the user's address.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for editing the user's address.
     */
    public function addressShow(Request $request)
    {
        return view(
            'user.profile.address',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for deleting the user's account.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for deleting the user's account.
     */
    public function deleteShow(Request $request)
    {
        return view(
            'user.profile.delete',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for changing the user's password.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for changing the user's password.
     */
    public function passwordShow(Request $request)
    {
        return view(
            'user.profile.password',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }

    /**
     * Display the form for setting up two-factor authentication.
     *
     * @param Request $request The incoming request.
     * @return \Illuminate\View\View The view for setting up two-factor authentication.
     */
    public function twoAFShow(Request $request)
    {
        return view(
            'user.profile.2af',
            [
                'request' => $request,
                'user' => $request->user(),
            ]
        );
    }
}