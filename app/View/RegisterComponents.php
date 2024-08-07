<?php

namespace App\View;

use App\Http\Controllers\Features\DarkmodeController;
use Livewire\Livewire;

/**
 * Class RegisterComponents
 * 
 * This class is responsible for registering Livewire components.
 */
class RegisterComponents
{
    /**
     * Boot method to initialize the registration of components.
     * 
     * This method calls the methods to register components.
     */
    public static function boot()
    {
        self::registerAdminComponents();
        self::registerUserComponents();
    }

    /**
     * Register admin components.
     * 
     * This method registers various Livewire components used in the admin interface.
     */
    public static function registerAdminComponents()
    {
        // Livewire components for admin interface
        Livewire::component('admin-header', \App\View\Livewire\Admin\Partials\Header::class);
        Livewire::component('admin-footer', \App\View\Livewire\Admin\Partials\Footer::class);
        Livewire::component('admin-sidebar', \App\View\Livewire\Admin\Partials\Sidebar::class);
        Livewire::component('admin-leftsidebar', \App\View\Livewire\Admin\Partials\LeftSidebar::class);
        Livewire::component('admin-season-flash', \App\View\Livewire\Admin\Partials\SessionFlash::class);

        Livewire::component('admin-profile', \App\View\Livewire\Admin\Profile::class);
        Livewire::component('admin-Dashboard', \App\View\Livewire\Admin\Dashboard::class);

        //Regular components for admin interface

    }

    /**
     * Register user components.
     * 
     * This method registers various Livewire components used in the user interface.
     */
    public static function registerUserComponents()
    {
        // Livewire components for user interface
        Livewire::component('user-header', \App\View\Livewire\User\Partials\Header::class);
        Livewire::component('user-footer', \App\View\Livewire\User\Partials\Footer::class);
        Livewire::component('user-sidebar', \App\View\Livewire\User\Partials\Sidebar::class);
        Livewire::component('user-profile', \App\View\Livewire\User\Profile::class);
        Livewire::component('user-dashboard', \App\View\Livewire\User\Dashboard::class);

        // Regular components for user interface
    }
}