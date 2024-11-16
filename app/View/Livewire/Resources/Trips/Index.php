<?php

namespace App\View\Livewire\Resources\Trips;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Index extends Component
{
    use WithPagination;

    public $user;
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 20;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => ''],
        'sortDirection' => ['except' => ''],
        'page' => ['except' => '1'],
    ];
    
    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }
    abstract public function render();
}
