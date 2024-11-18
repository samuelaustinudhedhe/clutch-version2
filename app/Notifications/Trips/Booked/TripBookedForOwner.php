<?php

namespace App\Notifications\Trips\Booked;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TripBookedForOwner extends TripBooked
{

    /**
     * Get the mail representation of the notification.
     */

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Booking for Your Vehicle')
            ->line('A new trip has been booked for your vehicle and')
            ->line('Trip ID: ' . $this->trip->id)
            ->line('Vehicle: ' . $this->trip->vehicle->name)
            ->line('Start Date: ' . static::getDateTime($this->trip->details->start->timestamp))
            ->action('View Trip Details', $this->getUrl());
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'trip_id' => $this->trip->id,
            'message' => 'A new trip has been booked for your vehicle.',
        ];
    }
}
