<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $routeName = $request->route()->getName();

            if (($user->onboardingStart() || !$user->onboardingCompleted()) && !$user->onboardingIsSkipped() && $routeName !== 'user.onboarding') {
                return redirect()->route('user.onboarding');
            } elseif ($routeName === 'user.onboarding' && $user->onboardingCompleted()) {
                return redirect()->route('user.dashboard')->with('success', 'Welcome Onboard ' . $user->name);
            }
        }

        return $next($request);
    }
}
