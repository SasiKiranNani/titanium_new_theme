<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShareAgreementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public $agreementFIle;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $agreementFIle)
    {
        $this->email = $email;
        $this->agreementFIle = $agreementFIle;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Booking Details',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user_credentials',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        if (file_exists($this->agreementFIle)) {
            $attachments[] = $this->agreementFIle;
        }

        return $attachments;
    }
}
