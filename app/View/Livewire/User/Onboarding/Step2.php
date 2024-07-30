<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class Step2 extends Component
{
  
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
        return view('user.onboarding.step2');
    }
}
