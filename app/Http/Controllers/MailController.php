<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Laravel App',
            'body' => 'This is a test email sent from Laravel.'
        ];

        Mail::send('mails.test', $details, function($message) {
            $message->to('faiz.clcp571@gmail.com')
                    ->subject('Test Email');
        });

        return 'Email has been sent!';
    }
}
