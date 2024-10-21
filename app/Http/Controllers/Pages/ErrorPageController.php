<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorPageController extends PageController
{
    /**
     * Display the error page based on the provided error code.
     *
     * @param int $code The HTTP status code to display.
     * @return \Illuminate\View\View
     */
    public function showErrorPage($code, $message)
    {
        $view = "pages.errors.{$code}";

        if (view()->exists($view)) {
            return view($view, ['message' => $message] );
        }

        // Fallback to a generic error page if the specific error view does not exist
        return view('pages.errors.generic', ['code' => $code, 'message' => $message] );
    }
}
