<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request and check for required permissions.
     *
     * This middleware function checks if the authenticated user has the required permissions
     * to access a specific route or perform an action. If the user has the necessary permissions,
     * the request is allowed to proceed. Otherwise, the user is redirected with an error message.
     *
     * @param \Illuminate\Http\Request $request The incoming HTTP request.
     * @param \Closure $next The next middleware/handler in the pipeline.
     * @param string $permissions A pipe-separated string of required permissions.
     * @param string|null $guard The authentication guard to use (default: null).
     * @return \Symfony\Component\HttpFoundation\Response The response to be sent back to the user.
     */
    public function handle(Request $request, Closure $next, $permissions, $guard = null): Response
    {
        $permissions = array_map('strtolower', explode('|', $permissions));

        if (isLoggedIn($guard) && getPerson()->hasPermission($permissions)) {
            return $next($request);
        }

        $errorMessage = 'You do not have permission to perform this action. Code: 46-824_P';
        $redirectRoute = $guard === 'admin' ? 'admin.dashboard' : 'user.dashboard';

        return redirect()->route($redirectRoute)->with('error', $errorMessage);
    }
}
