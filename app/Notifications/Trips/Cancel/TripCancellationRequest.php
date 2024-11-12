<?php

namespace App\Notifications\Trips\Cancel;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TripCancellationRequest extends Notification
{
    use Queueable;

    protected $trip;
    protected $traveler;

    /**
     * Create a new notification instance.
     *
     * @param $trip
     * @param $traveler
     */
    public function __construct($trip, $traveler = null)
    {
        $this->trip = $trip;
        $this->traveler = $traveler ?? $trip->traveler;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Trip Cancellation Request')
            ->line("A cancellation request has been made for Trip #({$this->trip->id})")
            ->action('View Trip', url('/user/trips/show/' . $this->trip->id))
            ->line('Please review the request and take necessary action.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'trip_id' => $this->trip->id,
            'traveler_name' => $this->traveler->name,
            'message' => "A cancellation request has been made for Trip #({$this->trip->id}).",
        ];
    }
}