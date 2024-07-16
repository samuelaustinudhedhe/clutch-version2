<?php

namespace App\View\Livewire\User\Partials;

use Livewire\Component;

class Header extends Component
{
    public $user;
    public $notifications;

    protected $listeners = ['userUpdated' => 'refreshUser', 'notificationReceived' => 'refreshNotifications'];

    public function mount()
    {
        $this->refreshUser();
        // $this->refreshNotifications();
    }
 
    public function refreshUser()
    {
        $this->user = getUser();
    }

    public function refreshNotifications()
    {
        // Assuming you have a Notification model and a relationship set up
        $this->notifications = getUser()->notifications()->latest()->take(5)->get();
    }

    public function render()
    {
        return view('user.dashboard.header');
    }
}
