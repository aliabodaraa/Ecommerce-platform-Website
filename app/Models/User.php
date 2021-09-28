<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function photo(){//one to one polymorphic between photo & (user&course)
        return $this->morphOne('App\Models\Photo','photoable');
    }
    public function tracks(){//many to many between track & user
        return $this->belongsToMany('App\Models\Track');
    }
    public function courses(){//many to many between course & user
        return $this->belongsToMany('App\Models\Course');
    }
    public function quizzes(){//many to many between quiz & user
        return $this->belongsToMany('App\Models\Quiz');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
     protected $fillable = [
         'name',
         'email',
         'password',
         'admin'
     ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
