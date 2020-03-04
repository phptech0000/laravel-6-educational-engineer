<?php

namespace App\Listeners;

use App\Envents\ReadEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReadListener
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
     * @param  ReadEvent  $event
     * @return void
     */
    public function handle(ReadEvent $event)
    {
        //
    }
}
