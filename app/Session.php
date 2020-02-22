<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chat;
use App\message;

/**
 * App\Session
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Chat[] $chats
 * @property-read int|null $chats_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\message[] $messages
 * @property-read int|null $messages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session query()
 * @mixin \Eloquent
 */
class Session extends Model {

    protected $fillable = ['sender_id', 'receiver_id'];

    public function chats() {
        return $this->hasManyThrough(Chat::class, message::class);
    }

    public function messages() {
        return $this->hasMany(message::class);
    }
    
}
