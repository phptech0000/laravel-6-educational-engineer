<?php

namespace App\Listeners;

use App\Events\UserHasRegistered ;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Email
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
     * @param  UserHasRegistered   $event
     * @return void
     */
    public function welcome(UserHasRegistered  $event)
    {
       
    }
}
