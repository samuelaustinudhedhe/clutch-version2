<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Kernel;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        /**
         * Set the middleware priority.
         * 
         * @param array $priority The priority array for middleware.
         */
        $middleware->priority(Kernel::$priority);

        /**
         * Use the specified middleware.
         * 
         * @param array $use The array of middleware to use.
         */
        $middleware->use(Kernel::$use);

        /**
         * Set middleware aliases.
         * 
         * @param array $alias The array of middleware aliases.
         */
        $middleware->alias(Kernel::$alias);

        /**
         * Append middleware to the 'web' and 'api' groups.
         * 
         * @param Middleware $middleware The middleware instance.
         */
        Kernel::appendToGroup($middleware);
        $middleware->web(append: Kernel::$groups['append']['web']);
        $middleware->api(append: Kernel::$groups['append']['api']);

        /**
         * Prepend middleware to the 'web' and 'api' groups.
         * 
         * @param Middleware $middleware The middleware instance.
         */
        Kernel::prependToGroup($middleware);
        $middleware->web(prepend: Kernel::$groups['prepend']['web']);
        $middleware->api(prepend: Kernel::$groups['prepend']['web']);
        
        /**
         * Replace middleware in the 'web' and 'api' groups.
         * 
         * @param Middleware $middleware The middleware instance.
         */
        Kernel::replace($middleware);
        $middleware->web(replace: Kernel::$groups['replace']['web']);
        $middleware->api(replace: Kernel::$groups['replace']['api']);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
