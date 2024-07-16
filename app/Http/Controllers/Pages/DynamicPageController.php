<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DynamicPageController extends PageController
{
 /**
     * Display the specified page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        // Replace slashes with dots for nested Blade view support
        $viewName = str_replace('/', '.', $slug);

        // Check if the Blade view exists
        if (View::exists($viewName)) {
            // Return the Blade view with request data
            return view($viewName, ['request' => $request]);
        }

        // If the view does not exist, return a 404 response
        error(404);
    }
}
