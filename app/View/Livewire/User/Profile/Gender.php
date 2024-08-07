<?php

namespace App\View\Livewire\User\Profile;

use Livewire\Component;

class Gender extends Component
{
    public $user;
    public $gender;

    public function updateGender(){

        $this->dispatch('notify', 'Gender updated successfully', 'success');
    }

    public function render()
    {
        return view('user.profile.gender');
    }
}
