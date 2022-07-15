<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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


        $mailChimpApiKey = env('MAILCHIMP_API_KEY');
        $mailchimp = new \Mailchimp($mailChimpApiKey);
        $mailchimp->lists->subscribe(env('MAILCHIMP_LIST_ID'),
           ['email'=>$event->user->email],
           null,
           null,
           false);
    }
}
