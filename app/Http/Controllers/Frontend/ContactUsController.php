<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\UserContactUs;
use App\Jobs\ContactUsJob;
use Mail;

class ContactUsController extends Controller
{
    public function submitContactForm(Request $request)
    {
        $data = [
            'email'     => $request->email,
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'message'   => $request->message,
        ];
        dispatch((new ContactUsJob($data))->delay(now()->addSeconds(10)));
        parent::successMessage('Message sent successfully');

        return redirect()->back();
    }
}
