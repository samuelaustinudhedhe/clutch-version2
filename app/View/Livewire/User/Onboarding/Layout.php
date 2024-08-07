<?php

namespace App\View\Livewire\User\Onboarding;

use App\Notifications\Onboarding\Completed;
use App\Notifications\Onboarding\Skipped;
use Livewire\Attributes\On;
use Livewire\Component;

class Layout extends Component
{
    public $step = 0;
    public $role;
    public $user;

    /**
     * Initialize the component by setting the user property.
     * 
     * This method is called when the component is mounted. It retrieves the current user
     * and assigns it to the user property of the component.
     * 
     * @return void
     */
    public function mount()
    {
        $this->user = getUser();
    }
    
    /**
     * Check and update the current step based on the user's role.
     */
    public function checkSteps()
    {
        if (auth()->user()->role !== 'subscriber' && ($this->step == 0 || $this->step == 1)) {
            //    $this->step = 2;
        }
    }

    /**
     * Move to the next step in the onboarding process.
     * 
     * @return void
     */
    #[On('onboarding-next-step')]
    public function nextStep()
    {
        $this->step++;
        $this->checkSteps();
    }

    /**
     * Move to the previous step in the onboarding process.
     * 
     * @return void
     */
    #[On('onboarding-prev-step')]
    public function prevStep()
    {
        $this->step--;
        $this->checkSteps();
    }

    /**
     * Complete the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a completion message.
     */
    #[On('onboarding-completed')]
    public function completeOnboarding()
    {
        $this->user->forceFill([
            'boarding->status' => 'completed',
            'boarding->step' => $this->step,
            'boarding->restart_at' => '',
            'boarding->completed_at' => now(),
        ])->save();

        $this->user->notify(new Completed());
        // Redirect to the user dashboard after completing the onboarding process
        return redirect()->route('user.dashboard')->with('message', 'You have completed the onboarding process. You have been updated to ' . ucfirst($this->role) . '.');
    }

    /**
     * Skip the onboarding process.
     * 
     * @return \Illuminate\Http\RedirectResponse Redirects to the user dashboard with a skip message.
     */
    #[On('onboarding-skip')]
    public function skipOnboarding()
    {
        // Update the user's onboarding status
        $this->user->forceFill([
            'boarding->status' => 'skipped',
            'boarding->step' => $this->step,
            'boarding->restart_at' => now()->addDays(2),
            'boarding->completed_at' => '',
        ])->save();

        // Notify the user about the skipped onboarding process 
        $this->user->notify(new Skipped());

        // Redirect to the user dashboard after skipping the onboarding process
        return redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process.');
    }

    public function render()
    {
        return view('user.onboarding.layout');
    }
}
