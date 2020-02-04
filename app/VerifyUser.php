<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
/**
 * App\VerifyUser
 *
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereUserId($value)
 * @mixin \Eloquent
 */
class VerifyUser extends Model
{
    protected $guarded = [];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
