<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\branch;
use App\media;
/**
 * App\deps
 *
 * @property int $id
 * @property string $name
 * @property string $year_found
 * @property string $descirptions
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $SuperVisior
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\branch[] $brances
 * @property-read int|null $brances_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\media[] $medias
 * @property-read int|null $medias_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereDescirptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\dep whereYearFound($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\branch[] $branches
 * @property-read int|null $branches_count
 */
class dep extends Model
{
    protected $fillable = ['name' , 'year_found','descirptions','user_id'];
    public function SuperVisior() {
            return $this->belongsTo('App\User','user_id');
    }
    
    public function branches() {
        
        return $this->hasMany(branch::class);
    }
    
    public function medias() {
        return $this->hasMany(media::class);
        
    }
}
