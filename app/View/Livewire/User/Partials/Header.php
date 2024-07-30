<?php

namespace App\View\Livewire\User\Partials;

use App\Models\User;
use Livewire\Component;

class Header extends Component
{
    public $user;
    public $userId;
    public $unreadNotification;
    public $notifications;

    protected $listeners = ['userUpdated' => 'refreshUser', 'notificationReceived' => 'refreshNotifications'];

    public function mount()
    {
        $this->user =getUser();
        $this->unreadNotification = $this->user->unreadNotifications;

        // $this->refreshNotifications();
        
    }

    public function refreshNotifications()
    {
        // Assuming you have a Notification model and a relationship set up
        $this->notifications = $this->user->notifications()->latest()->take(5)->get();
    }

    public function render()
    {
        return view('user.partials.header');
    }
}
