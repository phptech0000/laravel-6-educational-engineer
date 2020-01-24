<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * App\branch
 *
 * @property int $id
 * @property string $branch
 * @property int $dep_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\deps $dep
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch whereBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch whereDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\branch whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class branch extends Model {

    protected $fillable = ['name' , 'dep_id'];

    public function users() {
        return $this->hasMany('App\User');
    }
    public function dep() {
        return $this->belongsTo('App\deps', 'dep_id');
    }

}
