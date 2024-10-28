<?php

namespace App\View\Livewire\Admin\Partials;

use Livewire\Component;

class Header extends Component
{
    public $admin;
    public $unreadNotification;
    public $notifications;


    function mount(){
        $this->admin = getAdmin();
        $this->unreadNotification = $this->admin->unreadNotifications;

    }

    public function markAsRead($notification){
        $notification->markAsRead();
        $this->refreshNotifications();
    }

    public function refreshNotifications()
    {
        // Assuming you have a Notification model and a relationship set up
        $this->notifications = $this->user->notifications()->latest()->take(5)->get();
    }


    public function render()
    {
        return view('admin.partials.header');
    }
}
