<?php

/*
  |--------------------------------------------------------------------------
  | Broadcast Channels
  |--------------------------------------------------------------------------
  |
  | Here you may register all of the event broadcasting channels that your
  | application supports. The given channel authorization callbacks are
  | used to check if an authenticated user can listen to the channel.
  |
 */

Broadcast::channel('App.User.{userId}', function ($user, $userId) {
    return $user->id == $userId;
});

Broadcast::channel('chat', function ($user) {
    return auth()->check();
});
Broadcast::channel('chat.{session}', function ($user, App\Session $session) {
    if ($user->id == $session->sender_id || $user->id == $session->receiver_id){
        return true;
    }
    return false;
});
