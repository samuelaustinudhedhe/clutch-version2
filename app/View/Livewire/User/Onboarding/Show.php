<?php

namespace App\View\Livewire\User\Onboarding;

use App\Models\Role;
use App\Models\User;
use App\Notifications\Onboarding\Completed;
use App\Notifications\Onboarding\Skipped;
use Livewire\Component;
use Livewire\Attributes\On;

class Show extends Component
{
    public $step = 0;
    public $role;
    public $user;

    protected $rules = [
        'role' => 'required|exists:roles,slug',
    ];

    public function mount(){
        $this->user = getUser();
    }
    /**
     * Check and update the current step based on the user's role.
     */
    public function checkSteps()
    {
        if (auth()->user()->role !== 'subscriber' && ($this->step == 0 || $this->step == 1)) {
            $this->step = 2;
        }
    }

    /**
     * Move to the next step in the onboarding process.
     */
    #[On('onboarding-next-step')]
    public function nextStep()
    {
        $this->step++;
        $this->checkSteps();
    }

    /**
     * Move to the previous step in the onboarding process.
     */
    #[On('onboarding-prev-step')]
    public function prevStep()
    {
        $this->step--;
        $this->checkSteps();
    }

    /**
     * Complete the onboarding process.
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
     */
    #[On('onboarding-skip')]
    public function skipOnboarding()
    {
        $this->user->forceFill([
            'boarding->status' => 'skipped',
            'boarding->step' => $this->step,
            'boarding->restart_at' => now()->addDays(2),
            'boarding->completed_at' => '',
        ])->save();
        $this->user->notify(new Skipped());
        // Redirect to the user dashboard after skipping the onboarding process
        return redirect()->route('user.dashboard')->with('info', 'You have skipped the onboarding process.');
    }

    /**
     * Validate the selected role.
     *
     * @return bool
     */
    public function validateRole(): bool
    {
        $role = Role::where('slug', $this->role)->where('guard', 'web')->first();
        return $role !== null;
    }

    /**
     * Update the user's role and move to the next step.
     */
    public function updateRole()
    {
        $this->validate();

        if ($this->validateRole()) {
            $this->user->role = $this->role;
            $this->user->save();

            $this->nextStep();
        } else {
            $this->addError('role', 'Invalid selection.');
        }
    }

    /**
     * Render the onboarding view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('user.onboarding.show');
    }
}