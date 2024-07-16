<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class AdminAuthController extends Controller
{
    /**
     * Show the login form for admin users.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        if (Cookie::get('error_62404')) {
            return redirect()->route('login');
        }
        $this->logoutAllUsers();

        // Return the login view for admin users
        return view('auth.admin.login');
    }

    /**
     * Handle the admin login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Retrieve email and password from the request
        $credentials = $request->only('email', 'password');

        // Check if 'remember-me' checkbox is checked
        $remember = $request->has('remember-me');

        // Attempt to authenticate the admin with the provided credentials
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            // Redirect to the intended page or the admin dashboard if authentication is successful
            return redirect()->intended(route('admin.dashboard'));
        }

        // Redirect back to the login page with an error message if authentication fails
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * Log the admin user out and redirect to the login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Logout the currently authenticated admin
        Auth::guard('admin')->logout();

        // Redirect to the admin login page
        return redirect()->route('admin.login');
    }

    /**
     * Show the registration form for guest users.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistration()
    {
        // Logout any currently authenticated admin to ensure a fresh registration
        $this->logoutAllUsers();

        // Return the registration view for admin users
        return view('auth.admin.register');
    }

    /**
     * Handle the admin registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login');
    }

    /**
     * Logout all users regardless of their guard and kill all session data.
     */
    protected function logoutAllUsers()
    {
        // Invalidate the session
        session()->invalidate();

        // Regenerate the session token
        session()->regenerateToken();

        // Check if the current guard is 'admin' and logout the admin if true
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }

        // Check if the current guard is 'web' and logout the user if true
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();

            // Plant a cookie and store a file to indicate the user was redirected
            Cookie::queue('error_62404', true);
            // File::put(storage_path('app/62404-rr'), 'true');

            return redirect()->route('login');
        }
    }
}
