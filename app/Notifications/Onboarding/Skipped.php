<?php
namespace App\Notifications\Onboarding;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Skipped extends Notification
{
    use Queueable;

    public function __construct()
    {
        // Add any data if needed
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have skipped the onboarding process.')
                    ->action('Complete Onboarding', url('/onboarding'))
                    ->line('Please complete the onboarding process to access all features.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'You have skipped the onboarding process.',
        ];
    }
}
