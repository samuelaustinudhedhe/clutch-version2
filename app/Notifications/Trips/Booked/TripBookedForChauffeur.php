<?php

namespace App\Notifications\Trips\Booked;


use Illuminate\Notifications\Messages\MailMessage;

class TripBookedForChauffeur extends TripBooked
{
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('New Trip Booked')
        ->line('A new trip has been booked that requires your services.')
        ->line('Trip ID: ' . $this->trip->id)
        ->line('Start Date: ' . static::getDateTime($this->trip->details->start->timestamp));
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
            'message' => 'A new trip has been booked.',
        ];
    }
}
