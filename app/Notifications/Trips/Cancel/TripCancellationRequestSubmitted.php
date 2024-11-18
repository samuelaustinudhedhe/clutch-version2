<?php

namespace App\Notifications\Trips\Cancel;

use Illuminate\Notifications\Messages\MailMessage;

class TripCancellationRequestSubmitted extends TripCancellationRequest
{
    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Trip Cancellation Request Submitted')
            ->line("A cancellation request has been submitted for Trip #({$this->trip->id}) by {$this->traveler->name}.")
            ->action('View Trip', $this->getUrl($this->trip->id))
            ->line('Please wait for further updates regarding the cancellation.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray(object $notifiable): array
    {
        return [
            'trip_id' => $this->trip->id,
            'traveler_name' => $this->traveler->name,
            'message' => "A cancellation request has been submitted for Trip #({$this->trip->id}) by {$this->traveler->name}.",
        ];
    }
}