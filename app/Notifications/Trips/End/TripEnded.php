<?php

namespace App\Notifications\Trips\End;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TripEnded extends Notification
{
    use Queueable;

    protected $trip;
    protected $endedBy;

    /**
     * Create a new notification instance.
     *
     * @param $trip
     * @param $endedBy
     */
    public function __construct($trip, $endedBy)
    {
        $this->trip = $trip;
        $this->endedBy = $endedBy;
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
            ->subject('Trip Ended')
            ->line("Trip #({$this->trip->id}) has been successfully ended by {$this->endedBy->name}.")
            ->action('View Trip Details', url('/user/trips/show/' . $this->trip->id))
            ->line('Thank you for using our service.');
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
            'ended_by' => $this->endedBy->name,
            'message' => "Trip #({$this->trip->id}) has been successfully ended by {$this->endedBy->name}.",
        ];
    }
}