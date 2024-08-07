<?php
namespace App\Notifications\Onboarding;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Completed extends Notification
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
                    ->line('Congratulations! You have completed the onboarding process.')
                    ->action('Start Using Our App', url('/home'))
                    ->line('Thank you for completing the onboarding process.');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => ' Welcome onboard',
            'message' => 'Congratulations! You have completed the onboarding process. You are now a verified user.',
        ];
    }

    
}
