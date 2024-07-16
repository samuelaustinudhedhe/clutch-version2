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
        // Get the admin guard instance
        $authGuard = Auth::guard('admin');

        // Get the authenticated admin user
        $admin = $authGuard->user();

        // Check if the user is authenticated and their status is not suspended or deleted
        if ($authGuard->check() && !in_array($admin->status, ['suspended', 'deleted'])) {
            // Allow the request to proceed to the next middleware
            return $next($request);
        }

        // Abort the request with a 401 Unauthorized status code and an error message
        if (Auth::guard('web')->check()) {
            return redirect()->back()->with('error', 'Unauthorized Action. Code: 41-094_P');
        }
        redirect()->route('home')->with('error', 'Unauthorized Action. Code: 41-094_P');    
    }
}
