<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
   protected $fillable = ['user_id' ,'sender_id', 'message' , 'isLastMessage' , 'messagetime' , 'status'];
   public function user() {
       $this->belongsTo(User::class , 'user_id');
   }
}
