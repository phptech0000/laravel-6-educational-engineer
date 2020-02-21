<?php

namespace App\Listeners;

use App\Events\UserMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageListener
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
     * @param  UserMessageEvent  $event
     * @return void
     */
    public function handle(UserMessageEvent $event)
    {
        //
    }
}
