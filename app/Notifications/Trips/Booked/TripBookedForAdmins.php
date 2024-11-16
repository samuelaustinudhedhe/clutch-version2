<?php

namespace App\Notifications\Trips\Booked;

use Illuminate\Notifications\Messages\MailMessage;

class TripBookedForAdmins extends TripBooked
{

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Trip Booked')
            ->line('A new trip has been booked.')
            ->line('Trip ID: ' . $this->trip->id)
            ->line('Traveler: ' . $this->trip->traveler->name)
            ->line('Vehicle: ' . $this->trip->vehicle->name)
            ->line('Start Date: ' . static::getDateTime($this->trip->details->start->timestamp))
            ->action('View Trip Details', url('/admin/trips/' . $this->trip->id));
    
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
