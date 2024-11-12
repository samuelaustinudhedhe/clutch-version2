<?php

namespace App\Notifications\Trips\End;

use Illuminate\Notifications\Messages\MailMessage;

class TripEndRequestSubmitted extends TripEndRequest
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
            ->subject('Trip End Request Submitted')
            ->line("A request to end Trip #({$this->trip->id}) has been submitted by {$this->requester->name}.")
            ->action('View Trip', url('/user/trips/show/' . $this->trip->id))
            ->line('Please wait for further updates regarding the trip end.');
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
            'message' => "A request to end Trip #({$this->trip->id}) has been submitted by {$this->requester->name}.",
        ];
    }
}