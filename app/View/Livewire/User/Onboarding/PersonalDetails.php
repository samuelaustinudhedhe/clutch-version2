<?php

namespace App\View\Livewire\User\Onboarding;

use Livewire\Component;

class PersonalDetails extends Component
{
    /**
     * Dispatches an event to move to the next step in the onboarding process.
     *
     * @return void
     */
    public function nextStep()
    {
        $this->dispatch('onboarding-next-step');
    }

    /**
     * Dispatches an event to move to the previous step in the onboarding process.
     *
     * @return void
     */
    public function prevStep()
    {
        $this->dispatch('onboarding-prev-step');
    }

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