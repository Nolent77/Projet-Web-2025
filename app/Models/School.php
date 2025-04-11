<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table        = 'schools';
    protected $fillable     = ['user_id', 'name', 'description'];

    public static function getSchool(){
        return self::join('users', 'users.id', '=' , 'schools.user_id')
            ->where('schools.id', '=', 1)
            ->get();
    }


}
