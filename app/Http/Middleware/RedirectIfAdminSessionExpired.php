<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdminSessionExpired
{
    /**
     * Handle an incoming request and check for admin session expiration.
     *
     * This middleware checks if the admin is logged in and if their session is valid.
     * If not, it redirects to the admin login page.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming HTTP request.
     * @param  \Closure  $next  The next middleware/handler in the pipeline.
     * @return mixed  Returns the next handler if admin is logged in, otherwise redirects to admin login.
     */
    public function handle($request, Closure $next)
    {
        if (!isAdminLoggedIn() || getAdmin() === null) {
            return redirect()->route('admin.login');
        }
    
        return $next($request);
    }
}
