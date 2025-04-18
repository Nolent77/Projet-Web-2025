<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'birth_date',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * This function returns the full name of the connected user
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * This function returns the short name of the connected user
     * @return string
     */
    public function getShortNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name[0] . '.';
    }

    /**
     * Retrieve the school of the user
     */

    /**
     * @return (Model&object)|null
     */
    public function school()
    {
        // With this, the user can only have 1 school
        return $this->belongsToMany(School::class, 'users_schools')
            ->withPivot('role')
            ->first();
    }

    // This function retrieves the users associated with a specific role
    // by joining the `users` table and the `users_schools` table on the user ID
    public static function getUsersByRole($role){
        return self::join('users_schools', 'users.id' ,'=','users_schools.user_id' )
        ->where('users_schools.role', '=', $role)
        ->select('users.*','users_schools.role')
        ->get();
    }

    // This function defines a many-to-many relationship between the user and the cohorts
    // via the pivot table `cohort_user`
    public function cohorts(){
        return $this->belongsToMany(Cohort::class, 'cohort_user')
            ->withTimestamps();
    }

    public function userSchool(){
        return $this->hasOne(UserSchool::class); // Relation towards UserSchool
    }

    public function hasRole($role){
        return $this->userSchool && $this->userSchool->role === $role;// Search the relation userSchool and compare the role with what he got
    }
}
