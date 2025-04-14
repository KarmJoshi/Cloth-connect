<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmailForUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $Name;
    public $subjectText;
    public $messageText;

    public function __construct($Name,$subjectText,$messageText)
    {
        $this->Name = $Name;
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
    }
    
    public function build()
    {
        return $this->subject($this->subjectText)
        ->view('emails.welcome_ngo')
        ->with([
            'Name' => $this->Name,
            'messageText' => $this->messageText
        ]);
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail_user',
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
