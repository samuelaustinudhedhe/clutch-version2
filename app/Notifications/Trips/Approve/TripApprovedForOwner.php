<?php

namespace App\Notifications\Trips\Approve;


use Illuminate\Notifications\Messages\MailMessage;

class TripApprovedForOwner extends TripApproved
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
            ->line("You have approved the booking for Trip #({$this->booking->id}).")
            ->line('Please ensure the vehicle is ready for the traveler.')
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
            'message' => "You have approved the booking for Trip #({$this->booking->id}).",
        ];
    }
}
