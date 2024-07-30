<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class Step1 extends Show
{
   
    public function nextStep()
    {
        $this->dispatch('onboarding-next-step');
    }
    public function prevStep()
    {
        $this->dispatch('onboarding-prev-step');
    }
    public function skip()
    {
        $this->dispatch('onboarding-skip');
    }

    public function render()
    {
        return view('user.onboarding.step1');
    }
}
