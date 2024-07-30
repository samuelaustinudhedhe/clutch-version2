<?php

namespace App\View\Livewire\User;

use Livewire\Component;

class Onboarding extends Component
{
    public $step = 1;

    public $userData = [
        'name' => '',
        'email' => '',
        'password' => '',
    ];

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function submit()
    {
        // Validate and save the data
        $this->validate([
            'userData.name' => 'required|string|max:255',
            'userData.email' => 'required|email|max:255',
            'userData.password' => 'required|string|min:6',
        ]);

        // Save the user data to the database
        // User::create($this->userData);

        // Redirect or show a success message
        session()->flash('message', 'Onboarding completed successfully!');
        return redirect()->route('home');
    }
    public function render()
    {
        return view('user.onboarding.show');
    }
}
