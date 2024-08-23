<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the admin guard instance and the authenticated admin user
        $authGuard = Auth::guard('admin');
        $admin = $authGuard->user();

        if (Auth::guard('web')->check()) {
            return redirect()->back()->with('error', 'Unauthorized Action. Code: 41-094_P');
        }

        // Check if the user is authenticated and their status is not suspended or deleted
        if ($authGuard->check() && !in_array($admin->status, ['suspended', 'deleted'])) {
            return $next($request);
        }

        // Redirect to admin login with an error message
        return redirect()->route('admin.login')->with('error', 'Unauthorized Action. Code: 41-094_P');
    }
}
