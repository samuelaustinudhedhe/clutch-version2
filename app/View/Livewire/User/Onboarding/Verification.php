<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class Verification extends Layout
{
    public $preferences = [
        'notifications' => true,
    ];

    protected $rules = [
        'preferences.notifications' => 'boolean',
    ];

    public function nextStep()
    {
        $this->dispatch('onboarding-next-step');
    }

    public function prevStep()
    {
        $this->dispatch('onboarding-prev-step');
    }

    public function render()
    {
        return view('user.onboarding.verification');
    }
}
