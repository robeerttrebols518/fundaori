<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\TestMail;

class MailSend extends Controller
{
    public function mailsend(){
        $details = [
            'title' => 'Title: Mail form Nestor',
            'body' => 'Body: esto es una prueba',
        ];
        \Mail::to('nestoracunatable@gmail.com')->send(new TestMail($details));
        return view('emails.thanks');
    }
}