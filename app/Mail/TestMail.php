<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
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
        ->view('email.user_password_recover')
        ->subject('Recuperar su contraseña')
        ->with($this->data);
    }
}
