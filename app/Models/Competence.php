<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $table = 'competence'; // Nom de la table
    protected $fillable = ['id', 'user_id', 'role', 'competence', 'status'];

    public static function getCompetences($comptence){
        return self:: join('users', 'users.id', '=', 'competence.user_id')
        -> where('user_id' , '=', $comptence)
        -> select('competence.*', 'user.id');
    }
}
