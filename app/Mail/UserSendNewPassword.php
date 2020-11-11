<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSendNewPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
   

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->view('email.user_send_new_password')
        ->subject('Su nueva contraseña')
        ->with($this->data);
    }
}
