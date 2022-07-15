<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use Exception;
use Mailchimp;
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

        $client = new \MailchimpMarketing\ApiClient();

        $client->setConfig([
            'apiKey' => env('MAILCHIMP_API_KEY'),
            'server' => 'us17',
        ]);

        $email = $event->user->email;
        $domain = ltrim(stristr($email, '@'), '@');
        $response = $client->verifiedDomains->getDomain($domain);
        // dd($response);


        if (checkdnsrr($domain, 'ANY') && $domain != 'mailinator.com') {
            $mailChimpApiKey = env('MAILCHIMP_API_KEY');
            $mailchimp = new \Mailchimp($mailChimpApiKey);

            // $mailchimp->subscribte
            $mailchimp->lists->subscribe(
                env('MAILCHIMP_LIST_ID'),
                ['email' => $event->user->email],
                null,
                null,
                false
            );
        } else {
            return true;
        }
    }
}
