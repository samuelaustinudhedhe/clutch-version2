<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions, $guard = null): Response
    {
        // Get the authentication guard
        $authGuard = Auth::guard($guard);

        // Retrieve the authenticated user
        $user = $authGuard->user();

        // Convert permissions to an array of lowercase strings
        $permissions = array_map('strtolower', explode('|', $permissions));

        // Check if the user is authenticated and has the specified permissions
        if ($authGuard->check() && hasPermissions($user, $permissions)) {
            return $next($request);
        }

        // Redirect to the appropriate dashboard with an error message if the user is not authorized
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('error', 'You do not have the permission to perform this Action. Code: 46-824_P');
        }

        return redirect()->route('user.dashboard')->with('error', 'Unauthorized Action. Code: 46-824_P');
    }
}
