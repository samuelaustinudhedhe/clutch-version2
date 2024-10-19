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
    
    #[On('flashNotify')]
    public function flashNotify($message, $type)
    {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }

    private function setClass()
    {
        $this->class = match ($this->type) {
            'success' => 'border-green-800 dark:border-green-300',
            'error' => 'border-red-800 dark:border-red-300',
            'info' => 'border-blue-900 dark:border-blue-800',
            'warning' => 'border-yellow-800 dark:border-yellow-300 ',
            default => 'border-gray-300 dark:border-gray-600',
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
