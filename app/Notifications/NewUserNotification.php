<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use Carbon\Carbon;

class NewUserNotification extends Notification implements ShouldQueue {

    use Queueable;

    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user) {
        $this->user = $user;
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
            'user_id' => $this->user->id,
            'user_name' => $this->user->firstname . ' ' . $this->user->lastname,
            'user_email' => $this->user->email,
            'date' => $this->user->setTime(), //
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
            'read_at'=> null,
            'data' => [
                'user_id' => $this->user->id,
                'user_name' => $this->user->firstname . ' ' . $this->user->lastname,
                'user_email' => $this->user->email,
                'date' => $this->user->setTime(),
            ],
        ];
    }

}
