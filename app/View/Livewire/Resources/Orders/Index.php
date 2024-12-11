<?php

namespace App\View\Livewire\Resources\Orders;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Index extends Component
{
    use WithPagination;

    public $user;
    public $search;
    public $perPage = 20; 

    abstract public function render();
}
