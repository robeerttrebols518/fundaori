<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Mail;

class MailController extends Controller
{
    public function getMail(){
        $data = [
            'name' => 'Nestor'
        ];
        Mail::to('nestoracunatable@gmail.com')->send(new TestMail($data));
    }
}
