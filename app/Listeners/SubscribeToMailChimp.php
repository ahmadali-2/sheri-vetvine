<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use Exception;
use Yoeunes\Toastr\Facades\Toastr;

class SubscribeToMailChimp
{
    // private $mailchimp;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->mailchimp = $mailchimp;

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
            $email = $event->user->email;
            $domain = ltrim(stristr($email, '@'), '@');
            if(checkdnsrr($domain,'ANY') && $domain != 'mailinator.com'){
                $mailChimpApiKey = env('MAILCHIMP_API_KEY');
                $mailchimp = new \Mailchimp($mailChimpApiKey);
                $mailchimp->lists->subscribe(env('MAILCHIMP_LIST_ID'),
                    ['email'=>$event->user->email],
                    null,
                    null,
                    false);
            }else{
                return true;
            }
    }
}
