<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * @var string|null The authentication middleware.
     */
    public static $authMiddleware;

    /**
     * @var string|null The authentication session middleware.
     */
    public static $authSessionMiddleware;

    /**
     * UserDashboardController constructor.
     * Initializes the authentication middleware and session middleware based on the configuration.
     */
    public function __construct()
    {
        self::$authMiddleware = config('jetstream.guard')
            ? 'auth:' . config('jetstream.guard')
            : 'auth';

        self::$authSessionMiddleware = config('jetstream.auth_session', false)
            ? config('jetstream.auth_session')
            : null;
    }

    /**
     * Show the user dashboard.
     *
     * @param Request $request The current HTTP request instance.
     * @return \Illuminate\View\View The view for the user dashboard.
     */
    public function show(Request $request)
    {
        return view('user.dashboard.show', [
            'vehicles' => Vehicle::latest()->take(4)->get(),
            'request' => $request,
            'user' => $request->user()
        ]);
    }

}