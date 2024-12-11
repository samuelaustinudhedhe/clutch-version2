<?php

namespace App\View\Livewire\Resources\Orders;

use App\Models\Order;
use Livewire\Component;

abstract class Show extends Component
{
    public $order;
    public $queriedOrder;

    public function mount(Order $order)
    {
        // Check if the order belongs to the current user
        if ($this->condition()) {
            // Load the order details and related data
            $this->order = $order;
        } else {
            $this->queriedOrder = $order->id;
        }
    }
    /**
     * Initialize the component with the specified order.
     *
     * This method is automatically called by Livewire when the component is first loaded.
     * It sets up the component's state by assigning the provided order to the component's property.
     *
     * @param Order $order The Order model instance to be displayed in this component.
     *
     * @return void This method doesn't return a value.
     */
    // public function mount(Order $order)
    // {
    //     $this->order = $order;
    // }
    
    abstract function render();
}
