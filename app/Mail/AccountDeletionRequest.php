<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountDeletionRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $reason;
    public $userId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $reason, $userId = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->reason = $reason;
        $this->userId = $userId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Deletion Request - BDJobWar')
                    ->view('emails.account-deletion-request')
                    ->to('info@bdjobwar.com');
    }
}
