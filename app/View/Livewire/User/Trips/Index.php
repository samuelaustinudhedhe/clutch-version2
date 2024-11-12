<?php

namespace App\View\Livewire\User\Trips;

use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $user;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => ''],
        'sortDirection' => ['except' => ''],
        'page' => ['except' => '1'],
    ];

    final function mount()
    {
        $this->user = getUser();
    }

    public function render()
    {
        $trips = Trip::orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('user.trips.index', compact('trips'))->layout('layouts.user');
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }
}