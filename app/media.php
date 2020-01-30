<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\dep;

/**
 * App\media
 *
 * @property int $id
 * @property string $url
 * @property int|null $is_main
 * @property int|null $is_image
 * @property int $dep_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\dep $dep
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereIsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\media whereUrl($value)
 * @mixin \Eloquent
 */
class media extends Model {

    protected $fillable = ['url', 'is_main', 'is_image', 'dep_id'];

    public function dep() {
        return $this->belongsTo('App\deps', 'dep_id');
    }

}
