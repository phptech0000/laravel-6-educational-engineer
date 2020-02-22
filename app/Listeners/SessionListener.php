<?php

namespace App\Listeners;

use App\Events\SessionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SessionListener
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
     * @param  SessionEvent  $event
     * @return void
     */
    public function handle(SessionEvent $event)
    {
        //
    }
}
