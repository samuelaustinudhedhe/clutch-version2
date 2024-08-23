<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles, $guard = null): Response
    {
        // Get the authentication guard
        $authGuard = Auth::guard($guard);

        // Retrieve the authenticated user
        $user = $authGuard->user();

        // Convert roles to an array of lowercase strings
        $roles = array_map('strtolower', explode('|', $roles));

        // Check if the user is authenticated and has one of the specified roles
        if ($authGuard->check() && hasRole($user, $roles)) {
            return $next($request);
        }

        // Redirect to the appropriate dashboard with an error message if the user is not authorized
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('error', 'You do not have the authorized to perform this Action. Code: 46-824_R');
        }

        return redirect()->route('user.dashboard')->with('error', 'Unauthorized Action. Code: 46-824_R');
    }
}
