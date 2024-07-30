<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DynamicPageController extends PageController
{
    /**
     * Dynamically show blade files in a given path.
     *
     * This method dynamically constructs and returns a Blade view based on the provided slug
     * and an optional base path. The slug is converted into a view name by replacing slashes
     * with dots, which supports nested directories within the views.
     *
     * @param  \Illuminate\Http\Request  $request  The current HTTP request instance.
     * @param  string  $slug  The slug representing the requested page. This can be a nested path.
     * @param  string  $basePath  The base path to prepend to the view name. Defaults to 'user.pages'.
     * @return \Illuminate\View\View|\Illuminate\Http\Response  The rendered view or a 404 error response if the view does not exist.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException  If the view does not exist.
     *
     * @example
     * Given a URL pattern '/{slug}' and the route '/user/test', calling:
     * DynamicPageController::show($request, 'test', 'admin.user')
     * will attempt to render the view 'resources/views/admin/user/test.blade.php'.
     *
     * @example
     * Given a URL pattern '/{slug}' and the route '/user/nested/page', calling:
     * DynamicPageController::show($request, 'nested/page', 'admin.user')
     * will attempt to render the view 'resources/views/admin/user/nested/page.blade.php'.
     *
     * @usecase
     * This method is useful for applications where pages are dynamically generated
     * based on URL slugs, allowing for flexible and scalable view management without
     * the need for explicit route definitions for each page.
     */
    public static function show(Request $request, $slug, $basePath = null)
    {
        // Ensure the base path ends with a dot for proper namespacing
        if (substr($basePath, -1) !== '.') {
            $basePath .= '.';
        }

        // Convert the slug to a view name by replacing slashes with dots
        // This supports nested directories within the views
        $viewName = str_replace('/', '.', $slug);

        // Combine the base path with the view name
        $fullViewName = $basePath . $viewName;

        // Check if the Blade view exists
        if (View::exists($fullViewName)) {
            // Return the Blade view with the request data
            return view($fullViewName, ['request' => $request]);
        }

        // If the view does not exist, return a 404 error response
        return error(404);
    }
}
