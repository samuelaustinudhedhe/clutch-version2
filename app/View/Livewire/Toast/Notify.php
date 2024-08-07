<?php

namespace App\View\Livewire\Toast;

use Livewire\Component;
use Livewire\Attributes\On;

class Notify extends Component
{
    public $message;
    public $type;
    public $class;

    public function mount()
    {
        $this->initializeFromSession();
    }

    #[On('notify')]
    public function notify($message, $type = 'info')
    {
        $this->message = $message;
        $this->type = $type;
        $this->setClass();
    }

    private function setClass()
    {
        $this->class = match ($this->type) {
            // 'success' => 'bg-green-500',
            // 'error' => 'bg-red-500',
            // 'info' => 'bg-blue-800/80',
            // 'warning' => 'bg-yellow-500',
            default => 'bg-white dark:bg-gray-800',
        };
    }
    private function initializeFromSession()
    {
        if (session()->has('info')) {
            $this->message = session('info');
            $this->type = 'info';
        } elseif (session()->has('success')) {
            $this->message = session('success');
            $this->type = 'success';
        } elseif (session()->has('error')) {
            $this->message = session('error');
            $this->type = 'error';
        } elseif (session()->has('warning')) {
            $this->message = session('warning');
            $this->type = 'warning';
        }
    }
    public function render()
    {
        return view('layouts.toast.notify');
    }
}
