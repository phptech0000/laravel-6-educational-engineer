<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\User;

class UserRegistrationEvent implements ShouldBroadcast{

    use Dispatchable,
        InteractsWithSockets,
        SerializesModels;

    public $name;
    public $message;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->name = $data['name'];
        $this->message = $data['message'];
        $this->time = $data['time'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('newuser-notification');
    }

    public function broadcastAs() {
        return 'newuser-event';
    }

}
