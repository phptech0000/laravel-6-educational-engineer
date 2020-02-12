<?php

namespace App\Listeners;

use App\Events\UserFollowed ;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Followed
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
     * @param  UserFollowed   $event
     * @return void
     */
    public function handle(UserFollowed  $event)
    {
        //
    }
}
