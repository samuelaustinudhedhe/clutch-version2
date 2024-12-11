<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CheckOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if (isLoggedIn($guard)) {
            $user = getUser();
            $routeName = $request->route()->getName();

            if (($user->onboardingStart() || !$user->onboardingCompleted()) && !$user->onboardingIsSkipped() && $routeName !== 'user.onboarding') {
                return redirect()->route('user.onboarding');
            } elseif ($routeName === 'user.onboarding' && $user->onboardingCompleted()) {

                return redirect()->route('user.dashboard')->with('info', 'You have completed the onboarding process ' . $user->name);
            }
        }

        return $next($request);
    }
}
