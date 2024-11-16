<?php

namespace App\Notifications\Trips\Booked;

use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

abstract class TripBooked extends Notification
{
    use Queueable;


    protected $trip;

    /**
     * Create a new notification instance.
     */
    public function __construct($trip)
    {
        $this->trip = $trip;
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

    final static function getDateTime($timestamp) {
        if (is_numeric($timestamp)) {
            $dateTime = new DateTime();
            $dateTime->setTimestamp($timestamp);
        } else {
            $dateTime = new DateTime($timestamp);
        }
        return $dateTime->format('l, F j, Y \a\t g:i A');
    }

    /**
     * Get the mail representation of the notification.
     */
    abstract public function toMail(object $notifiable): MailMessage;

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    abstract public function toArray(object $notifiable): array;
}
