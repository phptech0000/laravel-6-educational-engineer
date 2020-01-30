<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year_name',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
