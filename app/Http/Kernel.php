<?php

namespace App\Http;

class Kernel
{
    /**
     * @var string|null The authentication middleware.
     */
    public static $authMiddleware;

    /**
     * @var string|null The authentication session middleware.
     */
    public static $authSessionMiddleware;

    /**
     * @var string|null The authentication middleware.
     */
    public static $userAuthMiddleware;

    /**
     * @var string|null The authentication session middleware.
     */
    public static $userAuthSessionMiddleware;


    public static $adminAuthSessionMiddleware;
    public static $adminRolesMiddleware = ['role:Administrator|SuperAdmin'];


    /**
     * The priority array for middleware.
     *
     * @var array
     */
    public static $priority = [];

    /**
     * The middleware groups for appending, prepending, and replacing.
     *
     * @var array
     */
    public static $groups = [

        'append' => [
            'web' => [
                // TestClass::class,
            ],
            'api' => [
                // TestClass::class,
            ],
        ],

        'prepend' => [
            'web' => [
                // TestClass::class,
            ],
            'api' => [
                // TestClass::class,
            ],
        ],

        'replace' => [
            'web' => [
                // TestClass::class,
            ],
            'api' => [
                // TestClass::class,
            ],
        ],

    ];

    /**
     * The middleware aliases.
     *
     * @var array
     */
    public static  $alias = [

        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'roles' => \App\Http\Middleware\RoleMiddleware::class,
        'permission' => \App\Http\Middleware\PermissionMiddleware::class,
        'permissions' => \App\Http\Middleware\PermissionMiddleware::class,
        'onboarding' => \App\Http\Middleware\CheckOnboarding::class,
        'intended' => \App\Http\Middleware\RedirectToIntendedRoute::class,
    ];

    /**
     * The middleware to use.
     *
     * @var array
     */
    public static $use = [
        // \Illuminate\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * Append middleware to a group.
     *
     * @param \Illuminate\Foundation\Configuration\Middleware $middleware
     * @return void
     */
    public static function appendToGroup($middleware)
    {
        // $middleware->prependToGroup('group-name', [
        //     First::class,
        //     Second::class,
        // ]);
    }

    /**
     * Prepend middleware to a group.
     *
     * @param \Illuminate\Foundation\Configuration\Middleware $middleware
     * @return void
     */
    public static function prependToGroup($middleware)
    {
        // $middleware->prependToGroup('group-name', [
        //     First::class,
        //     Second::class,
        // ]);
    }

    /**
     * Replace middleware in a group.
     *
     * @param \Illuminate\Foundation\Configuration\Middleware $middleware
     * @return void
     */
    public static function replace($middleware)
    {
        // $middleware->replace('group-name', [
        //     First::class,
        //     Second::class,
        // ]);
    }

    /**
     * Generate a role middleware string.
     *
     * This method takes an array or string of roles and converts it into a 
     * middleware string that can be used to check for the specified roles.
     *
     * @param array|string $roles The roles to be checked. Can be an array of roles or a single role as a string.
     * @return string The middleware string for role checking.
     */
    public static function role($roles, $guard = null)
    {
        if (is_array($roles)) {
            $roles = implode('|', $roles);
        }
        return "role:$roles,$guard";
    }

    /**
     * Generate a permission middleware string.
     *
     * This method takes an array or string of permissions and converts it into a 
     * middleware string that can be used to check for the specified permissions.
     *
     * @param array|string $permissions The permissions to be checked. Can be an array of permissions or a single permission as a string.
     * @return string The middleware string for permission checking.
     */
    public static function permission($permissions, $guard = null)
    {
        if (is_array($permissions)) {
            $permissions = implode('|', $permissions);
        }
        return "permission:$permissions,$guard";
    }

    public static function adminAuthMiddleware():string{

        return 'admin';
        
    } 
    /**
     * Get the authentication middleware based on the Jetstream guard configuration.
     *
     * @return string
     */
    final public static function getAuthMiddleware(): string
    {
        return config('jetstream.guard')
            ? 'auth:' . config('jetstream.guard')
            : 'auth';
    }

    /**
     * Get the authentication session middleware based on the Jetstream auth_session configuration.
     *
     * @return string|null
     */
    final public static function getAuthSessionMiddleware(): ?string
    {
        return config('jetstream.auth_session', false)
            ? config('jetstream.auth_session')
            : null;
    }
}
