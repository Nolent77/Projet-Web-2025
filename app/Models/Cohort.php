<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    protected $table = 'cohorts';
    protected $fillable = ['school_id', 'name', 'description', 'start_date', 'end_date'];

    // Permet d'avoir accès aux objet de School
    public function school(){
        return $this->belongsTo(School::class);
    }

}
