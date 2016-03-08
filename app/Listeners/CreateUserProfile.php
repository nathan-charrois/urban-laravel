<?php

namespace App\Listeners;

use GeoIP;
use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserProfile
{

    public $location;
    public $about;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->location = GeoIP::getLocation();
        $this->about = 'I\'m new here!';
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $event->user->profile()->create([
            'city' => $this->location['city'],
            'about' => $this->about
        ]);
    }
}
