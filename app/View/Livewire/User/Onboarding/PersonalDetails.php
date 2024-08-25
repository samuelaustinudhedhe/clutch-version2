<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class PersonalDetails extends Component
{
   

    /**
     * Renders the view for the personal details step in the onboarding process.
     *
     * @return \Illuminate\View\View The view for the personal details step.
     */
    public function render()
    {
        return view('user.onboarding.personal-details');
    }
}