<?php

namespace App\View\Livewire\Admin\Resources\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 25;
    public $search = '';
    public $roles;
    public $selected = []; // Array to hold selected user IDs
    public $selectAll = false; // Boolean to track the select all checkbox
    public $sortField = 'details->status'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $currentPageUsers; // Array to hold users currently being displayed

    protected $listeners = [
        'userCreated' => '$refresh'
    ];

    #[On('userCreated')]
    public function userCreated($user)
    {
        $this->refresh();
    }

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->currentPageUsers;
        } else {
            $this->selected = [];
        }
    }

    public function suspendAll()
    {
        User::whereIn('id', $this->selected)->update(['details->status' => 'suspended']);
        $this->resetSelection();
    }

    public function activateAll()
    {
        User::whereIn('id', $this->selected)->update(['details->status' => 'active']);
        $this->resetSelection();
    }

    public function deleteAll()
    {
        User::whereIn('id', $this->selected)->delete();
        $this->resetSelection();
    }

    private function resetSelection()
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        $this->currentPageUsers = $users->pluck('id')->toArray();

        $activeUsers = User::where('details->status', 'active')->count();
        
        return view('admin.resources.users.index', [
            'users' => $users,
            'allUsers' => User::all()->count(),
            'activeUsers' => $activeUsers,
        ])->layout('layouts.admin');
    }
}