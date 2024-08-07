<?php

namespace App\View\Livewire\User\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Name extends Component
{
    public $user;
    public $name;
    public $firstName;
    public $lastName;


    /**
     * Mount the component and initialize the user's name.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = getUser();
        $this->name = $this->user->name;
        session()->flash('info', 'Your name has updated successfully.');

        return redirect()->route('user.profile.show')->with('info', 'Your name wasn\'t changed.');

    }

    /**
     * Validate and update the user's name.
     *
     * @return void
     */
    public function updateName()
    {
        $this->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
        ]);
        $this->name = $this->firstName.' '.$this->lastName;

        $user = $this->user;
        $user->name = $this->name;
        $user->save();

        return redirect()->route('user.profile.show')->with('info', 'Your name wasn\'t changed.');

    }

    /**
     * Reset the form fields to their initial state.
     *
     * @return void
     */
    public function resetForm()
    {
        $this->firstName = '';
        $this->lastName = '';

        return redirect()->route('user.profile.show')->with('info', 'Your name wasn\'t changed.');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('user.profile.name')->layout('layouts.user-profile');
    }
}