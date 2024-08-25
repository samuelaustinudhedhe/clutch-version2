<?php

namespace App\View\Livewire\User;

use Livewire\Component;

/**
 * Class Notifications
 *
 * This Livewire component handles the display and interaction with user notifications.
 * It allows users to view a list of notifications, see details of a selected notification,
 * and toggle the visibility of the notification dropdown.
 *
 * @package App\View\Livewire\User
 */
class Notifications extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection $notifications
     * The collection of notifications for the authenticated user.
     */
    public $notifications;

    /**
     * @var array|null $selectedNotification
     * The currently selected notification details.
     */
    public $selectedNotification = null;

    /**
     * @var bool $isOpen
     * Indicates whether the notification dropdown is open.
     */
    public $isOpen = false;

    /**
     * Mount the component.
     *
     * Fetches the notifications for the authenticated user.
     *
     * @return void
     */
    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    /**
     * Show the details of a selected notification.
     *
     * @param int $notificationId
     * The ID of the notification to show details for.
     *
     * @return void
     */
    public function showDetails($notificationId)
    {
        $this->isOpen = true;
        $notification = $this->notifications->find($notificationId);
        $this->selectedNotification = [
            'id' => $notification->id,
            'title' => $notification->data['title'] ?? '',
            'message' => $notification->data['message'] ?? '',
            'image_url' => $notification->data['image_url'] ?? '',
        ];
    }

    /**
     * Go back to the notification list.
     *
     * Resets the selected notification.
     *
     * @return void
     */
    public function goBack()
    {
        $this->selectedNotification = null;
        $this->isOpen = true;
    }

    /**
     * Toggle the visibility of the notification dropdown.
     *
     * @return void
     */
    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('user.partials.notifications');
    }
}