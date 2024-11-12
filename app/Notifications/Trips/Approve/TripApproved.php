<?php

namespace App\Notifications\Trips\Approve;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TripApproved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $booking;
    protected $recipient;

    /**
     * Create a new notification instance.
     *
     * @param $booking
     * @param $recipient
     */
    public function __construct($booking, $recipient = null)
    {
        $this->booking = $booking;
        $this->recipient = $recipient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = (new MailMessage)
            ->subject('Trip Approved')
            ->greeting('Hello, ' . $this->recipient->name)
            ->line("We are pleased to inform you that Trip #({$this->booking->id}) has been approved.");

        if ($this->recipient->id !== $this->booking->vehicle->owner->id) {
            $message->line('You can now prepare for your upcoming trip.');
        } else {
            $message->line('Please ensure the vehicle is ready for the traveler.');
        }

        $message->action('View Trip Details', url('/trips/' . $this->booking->id))
            ->line('Thank you for using our service.');

        return $message;
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
            'message' => "Trip #({$this->booking->id}) has been approved.",
        ];
    }
}