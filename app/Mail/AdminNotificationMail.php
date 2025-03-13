<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $agreementData;
    public $pdfFilePath;

    public function __construct($agreementData, $pdfFilePath)
    {
        $this->agreementData = $agreementData;
        $this->pdfFilePath = $pdfFilePath;
    }
// this is the mail used to send the assign vehicle details and agreement to the admin
    public function build()
    {
        $email = $this->subject('New User Agreement')
                      ->view('emails.admin_notification')
                      ->with([
                          'agreementData' => $this->agreementData,
                      ]);

        // Attach the PDF
        if (file_exists($this->pdfFilePath)) {
            $email->attach($this->pdfFilePath);
        }

        return $email;
    }
}
