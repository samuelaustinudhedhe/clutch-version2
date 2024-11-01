<?php

namespace App\View\Livewire\Admin\Resources\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 15;
    public $search = '';
    public $roles;
    public $selected = []; // Array to hold selected user IDs
    public $selectAll = false; // Boolean to track the select all checkbox

    public function suspendAll()
    {
        Admin::whereIn('id', $this->selected)->updateDetails(['status' => 'suspended']);
        $this->resetSelection();
    }

    public function activeAll()
    {
        Admin::whereIn('id', $this->selected)->updateDetails(['status' => 'active']);
        $this->resetSelection();
    }

    public function deleteAll()
    {
        Admin::whereIn('id', $this->selected)->delete();
        $this->resetSelection();
    }

    private function resetSelection()
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    public function render()
    {
        $admins = Admin::search('name', $this->search)->paginate($this->perPage);
        $activeAdmins = Admin::search('details->status', 'active')->count();
        return view('admin.resources.admins.index', [
            'admins' => $admins,
            'allAdmins' => Admin::all()->count(),
            'activeAdmins' => $activeAdmins,
        ])->layout('layouts.admin');
    }
}
