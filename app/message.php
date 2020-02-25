<?php

namespace App;

use App\Chat;
use Illuminate\Database\Eloquent\Model;

/**
 * App\message
 *
 * @property int $id
 * @property int $user_id
 * @property int $sender_id
 * @property string $message
 * @property int|null $isLastMessage
 * @property string $messagetime
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Chat[] $chats
 * @property-read int|null $chats_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereIsLastMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereMessagetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\message whereUserId($value)
 * @mixin \Eloquent
 */
class message extends Model {

    protected $fillable = ['message', 'session_id' ,'messageTime'];

    public function chats() {
        return $this->hasMany(Chat::class);
    }

    public function SessionForSend($session_id) {
        $chat = new chat();
        $chat->session_id = $session_id;
        $chat->type = '0';
        $chat->read ='0';
        $chat->user()->associate(auth()->user());
        return $this->chats()->save($chat);
    }

    public function SessionForReceive($session_id, $user) {
        $chat = new chat();
        $chat->session_id = $session_id;
        $chat->type = '1';
        $chat->user()->associate($user);
        return $this->chats()->save($chat);
    }

}
