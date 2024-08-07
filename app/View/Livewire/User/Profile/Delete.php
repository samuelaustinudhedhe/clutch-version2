<?php

namespace App\View\Livewire\User\Profile;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $user;

    #[On('deleteUser')]
    public function deleteUser(User $user)
    {
        $user = $this->user;
        $user->status = 'deleted';
        $user->save();
    }
    
    public function render()
    {
        return view('user.profile.delete');
    }
}
