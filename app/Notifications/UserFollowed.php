<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;

class UserFollowed extends Notification implements ShouldQueue {

    use Queueable;

    public $follower;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $follower) {
        $this->follower = $follower;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->firstname . ' ' . $this->follower->lastname,
            'follower_email' => $this->follower->email,
            'date' => now(),
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable) {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'follower_id' => $this->follower->id,
                'follower_name' => $this->follower->firstname . ' ' . $this->follower->lastname,
                'follower_email' => $this->follower->email,
                'date' => now(),
            ],
        ];
    }

}
