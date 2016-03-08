<?php

namespace App\Listeners;

use Mail;
use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserValiation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        Mail::send('emails.verify', ['user' => $event->user], function ($m) use ($event) {
            $m->to($event->user->email)->subject('Welcome to Urbn.io');
        });
    }
}
