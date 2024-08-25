<?php

namespace App\View\Livewire\User\Onboarding;

use App\Notifications\Onboarding\Completed;
use App\Notifications\Onboarding\Skipped;
use App\Traits\WithSteps;
use Livewire\Attributes\On;
use Livewire\Component;

class Layout extends Component
{
    use WithSteps;

    public $role;
    public $user;
    public $data = [];

    protected $rules = [

        // 'data.role' => '',
        // 'data.address'=> '',
        // 'data.address.home.street'=> '',
        // 'data.address.home.unit'=> '',
        // 'data.address.home.city'=> '',
        // 'data.address.home.state'=> '',
        // 'data.address.home.country'=> '',
        // 'data.address.home.postal_code'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
        // 'data.'=> '',
    ];


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
        $this->data = $this->load();
    }

    public function defineSteps()
    {
        $this->stepNames = [
            0 => 'Introduction',
            1 => 'Your Goal',
            2 => 'Personal Details',
            3 => 'Verification',
            4 => 'KYC',
            5 => 'Review and Submit'
        ];
        $this->totalSteps = count($this->stepNames) - 1;
    }

    public function defineStore()
    {
        $this->rules['data.role'] = 'required|exists:roles,slug';

        $this->storePath = "Users/".getUser()->id."/data/onboarding.json";
        $this->storeData = $this->data;
    }
    /**
     * Check and update the current step based on the user's role.
     */
    public function checkSteps()
    {
        if (getUser()->role !== 'subscriber' && ($this->currentStep == 0 || $this->currentStep == 1)) {
            $this->currentStep = 2;
        }
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
            'boarding->step' => $this->currentStep,
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
        // Check if the user's onboarding status is already 'skipped'
        if ($this->user->onboarding->status !== 'skipped') {
            // Update the user's onboarding status
            $this->user->forceFill([
                'boarding->status' => 'skipped',
                'boarding->step' => $this->currentStep,
                'boarding->restart_at' => now()->addDays(2),
                'boarding->completed_at' => '',
            ])->save();

            // Notify the user about the skipped onboarding process 
            $this->user->notify(new Skipped());
        }

        // Redirect to the user dashboard after skipping the onboarding process
        return redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process.');
    }





    public function render()
    {
        return view(
            'user.onboarding.layout',
            [
                'prevStepName' => $this->getPrevStepName(),
                'nextStepName' => $this->getNextStepName(),
                'currentStepName' => $this->getStepName($this->currentStep),
                'currentStep' => $this->currentStep,
                'nextPrefix' => 'next-',
                'prevPrefix' => 'prev-',
            ]
        );
    }
}
