<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\message;;
/**
 * App\Chat
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\message $message
 * @property-read \App\User $user
 */
class Chat extends Model
{
     protected $fillable = ['session_id','message_id' ,'user_id' , 'type','stats'];
     public function user() {
         return $this->belongsTo(User::class ,'user_id');
     }
     public function message() {
         return $this->belongsTo(message::class , 'message_id');
     }
    
}
