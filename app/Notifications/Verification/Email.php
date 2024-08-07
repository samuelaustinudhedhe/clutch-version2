<?php

namespace App\Notifications\Verification;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class Email extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
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
        return (new MailMessage)
                    ->subject('Email Verification')
                    ->line('Please verify your email address by clicking the button below.')
                    ->action('Verify Email', url('/email/verify', $this->user->verification_token))
                    ->line('Thank you for using our application!');
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
            'message' => 'Please verify your email address.',
            'action_url' => url('/email/verify', $this->user->verification_token),
        ];
    }

    // /**
    //  * Get the Nexmo / SMS representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\NexmoMessage
    //  */
    // public function toNexmo($notifiable)
    // {
    //     return (new NexmoMessage)
    //                 ->content('Please verify your email address by clicking the link: ' . url('/email/verify', $this->user->verification_token));
    // }
}