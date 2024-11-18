<?php

namespace App\Notifications\Trips\Booked;

use DateTime;
use Illuminate\Notifications\Messages\MailMessage;

class TripBookedForTraveler extends TripBooked
{


    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Trip is Booked')
            ->line('Your trip has been booked. and is pending confirmation.')
            ->line('Trip ID: ' . $this->trip->id)
            ->line('Start Date: ' . static::getDateTime($this->trip->details->start->timestamp))            
            ->line('End Date: ' . static::getDateTime($this->trip->details->end->timestamp))            
            ->action('View Trip Details', $this->getUrl());
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
            'message' => 'Your trip has been booked.',
        ];
    }
}
