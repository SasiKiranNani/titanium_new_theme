<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;
    public $pdfFilePath;

    public function __construct($email, $password, $pdfFilePath)
    {
        $this->email = $email;
        $this->password = $password;
        $this->pdfFilePath = $pdfFilePath;
    }
//    this mail shared to the drivers mail after submitting the agreement
    public function build()
    {
        $email = $this->subject('Your Booking Details')
                      ->view('emails.user_credentials')
                      ->with([
                          'email' => $this->email,
                          'password' => $this->password,
                      ]);

        // Attach the PDF
        if (file_exists($this->pdfFilePath)) {
            $email->attach($this->pdfFilePath);
        }

        return $email;
    }
}
