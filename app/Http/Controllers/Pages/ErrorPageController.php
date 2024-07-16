<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorPageController extends PageController
{
 /**
     * Display the 404 error page.
     *
     * @return \Illuminate\View\View
     */
    public function notFound()
    {
        return view('errors.404');
    }

    /**
     * Display the 503 error page.
     *
     * @return \Illuminate\View\View
     */
    public function serviceUnavailable()
    {
        return view('errors.503');
    }

    /**
     * Display the 419 error page.
     *
     * @return \Illuminate\View\View
     */
    public function pageExpired()
    {
        return view('errors.419');
    }

    /**
     * Display the 500 error page.
     *
     * @return \Illuminate\View\View
     */
    public function serverError()
    {
        return view('errors.500');
    }

    /**
     * Display the 403 error page.
     *
     * @return \Illuminate\View\View
     */
    public function forbidden()
    {
        return view('errors.403');
    }

    /**
     * Display the 401 error page.
     *
     * @return \Illuminate\View\View
     */
    public function unauthorized()
    {
        return view('errors.401');
    }

}