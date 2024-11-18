<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    private $password;
    private $verification;
    
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
        $this->verification = is_string($user->verification) ? json_decode($user->verification, true) : $user->verification;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to ' . app_name(false),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $this->user->getKey(), 'hash' => sha1($this->user->getEmailForVerification())]
        );

        return new Content(
            view: 'emails.welcome',
            with: [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'verificationUrl' => $verificationUrl,
                'password' => $this->password,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}