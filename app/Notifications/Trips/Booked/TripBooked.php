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
     * Generate the URL for viewing a specific trip booking.
     *
     * This function creates a URL that points to the page where a user can view
     * the details of a specific trip booking. It uses the trip ID from the
     * current trip object, regardless of the provided parameter.
     *
     * @param int $tripId The ID of the trip (Note: This parameter is not used in the function body)
     * @return ($path is null ? \Illuminate\Contracts\Routing\UrlGenerator : string)
     */
    public function getUrl($tripId = null){
        $tripId = $this->trip->id;
        return  url('/user/bookings/show/' . $tripId );
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
