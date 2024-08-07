<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class Completed extends Component
{
    public function completeOnboarding(){
        
        $this->dispatch('onboarding-completed');
    }
    
    public function render()
    {
        return view('user.onboarding.completed');
    }
}
