<?php

namespace App\Notifications\Trips\Approve;

use Illuminate\Notifications\Messages\MailMessage;

class TripApprovedForTraveler extends TripApproved
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Trip Approved')
            ->greeting('Hello, ' . $notifiable->name)
            ->line("The owner has approved your booking for Trip #({$this->booking->id}).")
            ->line('Please prepare for pickup at the designated location.')
            ->line('Trip Details:')
            ->line('Pickup Location: ' . $this->booking->details->pickup_location)
            ->line('Start Date: ' . $this->booking->details->start_date)
            ->line('End Date: ' . $this->booking->details->end_date)
            ->action('View Trip Details', url('/trips/' . $this->booking->id))
            ->line('Thank you for using our service.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'message' => "The owner has approved your booking for Trip #({$this->booking->id}).",
        ];
    }
}
