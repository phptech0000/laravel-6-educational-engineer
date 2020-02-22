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
use App\Session;

class SessionEvent implements ShouldBroadcast {

    use Dispatchable,
        InteractsWithSockets,
        SerializesModels;

    public $user;
    public $session;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($session, User $user) {
        $this->session = $session;
        $this->user = $user;
    }

    public function broadcastWith() {
        return [
            'user_id' => $this->user->id,
            'sesstion_id' => $this->session->id,
            'sender_id' => $this->session->sender_id,
            'receiver_id' => $this->session->receiver_id
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('chat');
    }

}
