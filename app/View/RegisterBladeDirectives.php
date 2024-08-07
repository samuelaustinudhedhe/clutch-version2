<?php

namespace App\View;

use Illuminate\Support\Facades\Blade;

class RegisterBladeDirectives
{
    /**
     * Bootstraps the registration of custom Blade directives.
     *
     * This method initializes the registration of custom Blade directives
     * for custom directives.
     *
     * @return void
     */
    public static function boot()
    {
        self::registerRole();
        self::registerPermission();
        self::registerAdminFirewall(); //Admin FireWall 🔥 directive
        self::registerDarkMode(); // Register the darkModeSwitch directive

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
        Blade::directive('role', function ($roles) {
            // Remove parentheses, spaces, and quotes from the roles string, then split it into an array
            $roles = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $roles));

            // Create a string of conditions to check if the user or admin has any of the specified roles
            $rolesCheck = implode(' || ', array_map(function ($role) {
                return "auth()->user()->is('$role') || (auth('admin')->check() && auth('admin')->user()->is('$role'))";
            }, $roles));

            // Return the Blade directive for the role check
            return "<?php if(auth()->check() && ($rolesCheck)): ?>";
        });

        Blade::directive('notrole', function ($roles) {
            // Remove parentheses, spaces, and quotes from the roles string, then split it into an array
            $roles = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $roles));

            // Create a string of conditions to check if the user or admin does not have any of the specified roles
            $rolesCheck = implode(' && ', array_map(function ($role) {
                return "!auth()->user()->is('$role') && (!auth('admin')->check() || !auth('admin')->user()->is('$role'))";
            }, $roles));

            // Return the Blade directive for the notrole check
            return "<?php if(auth()->check() && ($rolesCheck)): ?>";
        });

        Blade::directive('endrole', function () {
            // Return the Blade directive to end the role check
            return "<?php endif; ?>";
        });
    }
    /**
     * Registers the 'permission' Blade directive.
     *
     * This directive checks if the authenticated user or the authenticated admin
     * has a specific permission.
     *
     * @return void
     */
    public static function registerCan()
    {
        Blade::directive('can', function ($permissions) {
            // Remove parentheses, spaces, and quotes from the permissions string, then split it into an array
            $permissions = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $permissions));

            // Create a string of conditions to check if the user or admin has any of the specified permissions
            $permissionsCheck = implode(' || ', array_map(function ($permission) {
                return "auth()->user()->can('$permission') || (auth('admin')->check() && auth('admin')->user()->can('$permission'))";
            }, $permissions));

            // Return the Blade directive for the permission check
            return "<?php if(auth()->check() && ($permissionsCheck)): ?>";
        });

        Blade::directive('notcan', function ($permissions) {
            // Remove parentheses, spaces, and quotes from the permissions string, then split it into an array
            $permissions = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $permissions));

            // Create a string of conditions to check if the user or admin does not have any of the specified permissions
            $permissionsCheck = implode(' && ', array_map(function ($permission) {
                return "!auth()->user()->can('$permission') && (!auth('admin')->check() || !auth('admin')->user()->can('$permission'))";
            }, $permissions));

            // Return the Blade directive for the notcan check
            return "<?php if(auth()->check() && ($permissionsCheck)): ?>";
        });

        Blade::directive('endcan', function () {
            // Return the Blade directive to end the permission check
            return "<?php endif; ?>";
        });
    }

    /**
     * Registers the 'permission' Blade directive.
     *
     * This directive checks if the authenticated user or the authenticated admin
     * has a specific permission.
     *
     * @return void
     */
    public static function registerPermission()
    {
        Blade::directive('permission', function ($permissions) {
            // Remove parentheses, spaces, and quotes from the permissions string, then split it into an array
            $permissions = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $permissions));

            // Create a string of conditions to check if the user or admin has any of the specified permissions
            $permissionsCheck = implode(' || ', array_map(function ($permission) {
                return "auth()->user()->can('$permission') || (auth('admin')->check() && auth('admin')->user()->can('$permission'))";
            }, $permissions));

            // Return the Blade directive for the permission check
            return "<?php if(auth()->check() && ($permissionsCheck)): ?>";
        });

        Blade::directive('notpermission', function ($permissions) {
            // Remove parentheses, spaces, and quotes from the permissions string, then split it into an array
            $permissions = explode(',', str_replace(['(', ')', ' ', '"', "'"], '', $permissions));

            // Create a string of conditions to check if the user or admin does not have any of the specified permissions
            $permissionsCheck = implode(' && ', array_map(function ($permission) {
                return "!auth()->user()->can('$permission') && (!auth('admin')->check() || !auth('admin')->user()->can('$permission'))";
            }, $permissions));

            // Return the Blade directive for the notpermission check
            return "<?php if(auth()->check() && ($permissionsCheck)): ?>";
        });

        Blade::directive('endpermission', function () {
            // Return the Blade directive to end the permission check
            return "<?php endif; ?>";
        });
    }

    /**
     * Registers the 'adminfirewall' Blade directive.
     *
     * This directive checks if the authenticated user is an admin.
     * If not, it redirects to the previous URL after 5 seconds and shows a 501 error.
     *
     * @return void
     */
    public static function registerAdminFirewall()
    {
        Blade::directive('adminfirewall', function () {
            $command = self::handleAdminFirewall();
            return "<?php $command  ?>";
        });
    }

    /**
     * Handles the admin firewall check.
     *
     * This function checks if the authenticated user is an admin. If not, it redirects
     * the user to the previous URL or a default URL after 5 seconds and shows an error.
     *
     * @return void
     */
    public static function handleAdminFirewall()
    {
        if (!auth('admin')->check()) {
            if (url()->previous() !== url()->current()) {
                header('Refresh: 5; url=' . url()->previous());
            } else {
                if (auth()->check()) {
                    header('Refresh: 5; url=' . url('/user/dashboard'));
                    error(404);
                    die;
                } else {
                    header('Refresh: 5; url=' . url('/'));
                }
            }
            error(501);
            exit(501);
        }
    }

    /**
     * Registers the 'darkMode' Blade directive.
     *
     * This directive outputs the dark mode  component.
     *
     * @return void
     */
    public static function registerDarkMode()
    {
        Blade::directive('darkModeSwitch', function () {
            return "<?php echo darkModeSwitch(); ?>";
        });

        Blade::directive('darkModeButton', function () {
            return "<?php echo darkModeButton(); ?>";
        });

        Blade::directive('darkModeModal', function () {
            return "<?php echo darkModeModal(); ?>";
        });
    }

}
