<?php

namespace App\View\Livewire\User\Profile;

use Livewire\Component;

use function Pest\Laravel\get;

class DateOfBirth extends Component
{
    public $user;
    public $date_of_birth;

    public function mount()
    {
        $this->user = getUser();
    }

    public function updateDateOfBirth()
    {

        // Validate the input
        $this->validate([
            'date_of_birth' => 'required|date'
        ]);

        // Update date of birth in the database
        $user = getUser();

        // Format the date of birth to the database format
        $this->date_of_birth = date('Y-m-d', strtotime($this->date_of_birth));
        $user->date_of_birth = $this->date_of_birth;
        $user->save();

        // Log the user's action
        // Example: \Log::info('User updated their date of birth', ['user_id' => auth()->id()]);
        // Redirect to the profile page
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('user.profile.date-of-birth')->layout('layouts.user-profile');;
    }
}
