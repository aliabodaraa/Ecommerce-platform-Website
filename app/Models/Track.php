<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
     protected $fillable=[
         'name',
        ];
    public function users(){//many to many between course & user
        return $this->belongsToMany('App\Models\User');
    }
    public function courses(){//one to many between track & course
        return $this->hasMany('App\Models\Course');
    }
}
