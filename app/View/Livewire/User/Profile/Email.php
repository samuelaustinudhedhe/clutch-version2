<?php

namespace App\View\Livewire\User\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\Verification\Email as NotificationsVerificationEmail;

class Email extends Component
{
    public $user;
    public $email;

    public $state = [
        'email' => '',
    ];

    public function mount()
    {
        $this->user = getUser();
        $this->email = $this->user->email;
    }


    public function updateEmail()
    {
        $this->validate([
            'state.email' => 'required|email',
            'state.password' => 'required|current_password',
        ]);

        $user = $this->user;
        $user->email = $this->state['email'];
        $user->save();

        session()->flash('message', 'Email updated successfully.');
    }

    public function sendEmailVerification()
    {
        $user = $this->user;
        $user->notify(new NotificationsVerificationEmail($user));
        session()->flash('message', 'Verification email sent.');
    }

    public function resetForm()
    {
        $this->state['email'] = '';
    }

    public function render()
    {
        return view('user.profile.email')->layout('layouts.user-profile');
    }
}