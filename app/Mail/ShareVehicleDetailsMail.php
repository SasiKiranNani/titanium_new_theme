<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareVehicleDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // this was used to send the mail from the drivers list
    public function build()
    {
        $subject = 'Vehicle Details Shared';

        return $this->subject($subject)
            ->view('emails.user_notification')
            ->with('data', $this->data);
    }
}
