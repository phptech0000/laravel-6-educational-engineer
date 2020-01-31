<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Year
 *
 * @property int $id
 * @property string $year_name
 * @property int|null $number_of_student
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereNumberOfStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereYearName($value)
 * @mixin \Eloquent
 */
class Year extends Model
{
    protected $fillable = [
        'year_name',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
