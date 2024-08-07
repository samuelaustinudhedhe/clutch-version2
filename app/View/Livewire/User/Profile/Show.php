<?php

namespace App\View\Livewire\User\Profile;

use Livewire\Component;

class Show extends Component
{
    public function updateGender(){

        $this->dispatch('notify', 'Gender updated successfully', 'success');
    }
    public function render()
    {
        return view('user.profile.show')->layout('layouts.user');
    }
}
