<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Boot the RegisterComponents class.
         * 
         * This method initializes the RegisterComponents class, which is responsible
         * for registering custom view components that can be used throughout the application.
         * 
         * @return void
         */
        \App\View\RegisterComponents::boot();

        /**
         * Boot the RegisterMacros class.
         * 
         * This method initializes the RegisterMacros class, which is responsible
         * for registering custom view macros that can be used throughout the application.
         * 
         * @return void
         */
        \App\View\RegisterMacros::boot();

        /**
         * Boot the RegisterBladeDirectives class.
         * 
         * This method initializes the RegisterBladeDirectives class, which is responsible
         * for registering custom Blade directives that can be used throughout the application.
         * 
         * @return void
         */
        \App\View\RegisterBladeDirectives::boot();
    }
}
