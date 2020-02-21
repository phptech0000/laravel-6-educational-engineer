<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\dep;
use App\branch;
use App\Year;
use App\VerifyUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use App\message;
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $phone
 * @property string|null $image
 * @property int $is_student
 * @property string|null $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $is_admin
 * @property int|null $is_staff
 * @property string|null $staff_type
 * @property int $branch_id
 * @property-read \App\branch $branch
 * @property-read \App\dep $dep
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsStaff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStaffType($value)
 * @property string|null $type_staff
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTypeStaff($value)
 */
class User extends Authenticatable {

    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'image',
        'gender',
        'birthdata',
        'academicrang',
        'mangment',
        'email',
        'is_staff',
        'password',
        'is_admin',
        'Contact_method',
        'verified',
        'approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dep() {
        return $this->hasone('App\deps');
    }

    public function branch() {
        return $this->belongsTo('App\branch', 'branch_id');
    }

    public function year() {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function verifyUser() {
        return $this->hasOne(VerifyUser::class);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail() {
        return $this->email;
    }

    public function followers() {
        return $this->belongsToMany(Self::class, 'followers', 'follows_id', 'user_id')->withTimestamps();
    }

    public function follows() {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
                        ->withTimestamps();
    }

    public function follow($userId) {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId) {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId) {
        return (boolean) $this->follows()->where('follows_id', $userId)->first();
    }

    public function setTime(){
        $date = now()->timezone('egypt');
        $format = "D , j M  \A\T H:i ";
        $dateFormat = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        $DateTime = strtoupper($dateFormat);
        return $DateTime;
    }
    public function messages(){
        $this->hasMany(message::class);
    }
}
