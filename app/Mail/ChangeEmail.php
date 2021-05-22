<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $newEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newEmail)
    {
        $this->newEmail = $newEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lbaw2111@gmail.com')
                    ->view('emails.changeEmail')->with("email", $this->newEmail);
    }
}
