<?php

if (!function_exists('previous_url')) {
    /**
     * Get the previous URL or fallback to home if not available.
     * Store the previous URL in the session if the user is not authenticated.
     *
     * @return string
     */
    function previous_url()
    {
        $previousUrl = url()->previous();
        $loginUrl = url('login');
        
        // Check if the user is not authenticated and the previous URL is not the login page
        if (!auth()->check() && $previousUrl !== $loginUrl) {
            session()->put('previous_url', $previousUrl);
        }

        // Return the previous URL from the session, or fallback to the home route
        return session('previous_url', route('home'));
    }
}