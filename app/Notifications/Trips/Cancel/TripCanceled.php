<?php

namespace App\Notifications\Trips\Cancel;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TripCanceled extends Notification
{
    use Queueable;

    protected $trip;
    protected $canceledBy;

    /**
     * Create a new notification instance.
     *
     * @param $trip
     * @param $canceledBy
     */
    public function __construct($trip, $canceledBy)
    {
        $this->trip = $trip;
        $this->canceledBy = $canceledBy;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Trip Cancellation Notice')
                    ->greeting('Hello,')
                    ->line("We regret to inform you that Trip #({$this->trip->id}) has been canceled.")
                    ->line("The cancellation was initiated by {$this->canceledBy->name}.")
                    ->line('If you have any questions or need further assistance, please contact our support team.')
                    ->action('View Trip Details', url('/user/trips/show/' . $this->trip->id))
                    ->line('Thank you for using our service.');
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
            'canceled_by' => $this->canceledBy->name,
            'message' => "Trip #({$this->trip->id}) has been canceled by {$this->canceledBy->name}.",
        ];
    }
}