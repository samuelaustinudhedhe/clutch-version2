<?php

namespace App\View;

use Illuminate\Support\Facades\Blade;

class RegisterBladeDirectives
{
    /**
     * Bootstraps the registration of custom Blade directives.
     *
     * This method initializes the registration of custom Blade directives
     * for role, is, and can checks.
     *
     * @return void
     */
    public static function boot()
    {
        self::registerRole();
        self::registerIs();
        self::registerCan();
    }

    /**
     * Registers the 'is' Blade directive.
     *
     * This directive checks if the authenticated user or the authenticated admin
     * has a specific role.
     *
     * @return void
     */
    public static function registerIs()
    {
        Blade::directive('is', function ($role) {
            return "<?php if(auth()->check() && (auth()->user()->is($role) || (auth('admin')->check() && auth('admin')->user()->is($role)))): ?>";
        });

        Blade::directive('endis', function () {
            return "<?php endif; ?>";
        });
    }

    /**
     * Registers the 'role' Blade directive.
     *
     * This directive checks if the authenticated user or the authenticated admin
     * has a specific role.
     *
     * @return void
     */
    public static function registerRole()
    {
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && (auth()->user()->is($role) || (auth('admin')->check() && auth('admin')->user()->is($role)))): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });
    }

    /**
     * Registers the 'can' Blade directive.
     *
     * This directive checks if the authenticated user or the authenticated admin
     * has a specific permission.
     *
     * @return void
     */
    public static function registerCan()
    {
        Blade::directive('can', function ($permission) {
            return "<?php if(auth()->check() && (auth()->user()->can($permission) || (auth('admin')->check() && auth('admin')->user()->can($permission)))): ?>";
        });

        Blade::directive('endcan', function () {
            return "<?php endif; ?>";
        });
    }
}