<?php

namespace App\View\Livewire\User\Bookings;

use App\Models\User;
use Livewire\Component;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function mount()
    {
    }

    public function render()
    {
        $bookings = getUser()->Vehicles()->search('name',  $this->search)->whereHas('trips')->paginate($this->perPage);
        
        return view('user.bookings.index', compact('bookings'))->layout('layouts.user');
    }
}