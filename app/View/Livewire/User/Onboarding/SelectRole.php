<?php

namespace App\View\Livewire\User\Onboarding;

use App\Models\Role;
use App\Traits\WithSteps;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelectRole extends Layout
{
    use WithSteps, WithFileUploads;
    // Public properties to hold the role and user data
    public $role;
    public $user;

    // Validation rules for the role property
    protected $rules = [
        'role' => 'required|exists:roles,slug',
    ];

    // Lifecycle hook that runs when the component is mounted
    public function mount()
    {
        // Initialize the user property with the current user
        $this->user = getUser();
    }

    /**
     * Validate the selected role.
     *
     * @return bool
     */
    public function validateRole(): bool
    {
        // Check if the role exists in the roles table with the 'web' guard
        $role = Role::where('slug', $this->role)->where('guard', 'web')->first();
        return $role !== null;
    }

    /**
     * Update the user's role and move to the next step.
     */
    public function updateRole()
    {
        // Validate the role property against the defined rules
        $this->validate();

        // If the role is valid, update the user's role and save it
        if ($this->validateRole()) {
            $this->user->role = $this->role;
            $this->user->save();

            // Move to the next step in the onboarding process
            $this->nextStep();
        } else {
            // Add an error message if the role is not valid
            $this->addError('role', trans('validation.exists', ['attribute' => 'role']));
        }
    }

    // Render the view for the component
    public function render()
    {
        return view('user.onboarding.select-role');
    }
}