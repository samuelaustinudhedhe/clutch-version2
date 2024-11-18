<?php

namespace App\View\Livewire\Admin\Resources\Trips;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('admin.resources.trips.edit')->layout('layouts.admin');
    }
}
