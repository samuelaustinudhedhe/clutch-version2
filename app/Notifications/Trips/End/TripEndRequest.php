<?php

namespace App\Notifications\Trips\End;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TripEndRequest extends Notification
{
    use Queueable;

    protected $trip;
    protected $requester;

    /**
     * Create a new notification instance.
     *
     * @param $trip
     * @param $requester
     */
    public function __construct($trip, $requester)
    {
        $this->trip = $trip;
        $this->requester = $requester;
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
            ->subject('Trip End Request')
            ->line("A request to end Trip #({$this->trip->id}) has been made by {$this->requester->name}.")
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
            'requester_name' => $this->requester->name,
            'message' => "A request to end Trip #({$this->trip->id}) has been made by {$this->requester->name}.",
        ];
    }
}