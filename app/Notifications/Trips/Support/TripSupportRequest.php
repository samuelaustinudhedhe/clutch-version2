<?php

namespace App\Notifications\Trips\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TripSupportRequest extends Notification
{
    use Queueable;

    protected $trip;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param $trip
     * @param $user
     */
    public function __construct($trip, $user)
    {
        $this->trip = $trip;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Support Request for Trip')
            ->greeting('Hello Support Team,')
            ->line("A support request has been made by {$this->user->name} for Trip #({$this->trip->id}).")
            ->line("Trip Details: Start Date - {$this->trip->details['start']}, End Date - {$this->trip->details['end']}")
            ->line("Order Details: Vehicle - {$this->trip->vehicle->name}, Chauffeur - {$this->trip->vehicle->chauffeur->name}")
            ->action('View Trip', url('/trips/' . $this->trip->id))
            ->line('Please review the request and provide the necessary support.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'trip_id' => $this->trip->id,
            'user_id' => $this->user->id,
            'message' => "Support request for Trip #({$this->trip->id}) by {$this->user->name}.",
        ];
    }
}