<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    use HasFactory;
     protected $fillable=[
         'title','status','link','track_id'
        ];
    public function photo(){//one to one polymorphic between photo & (user&course)
        return $this->morphOne('App\Models\Photo','photoable');
    }
    public function users(){//many to many between course & user
        return $this->belongsToMany('App\Models\User');
    }
    public function track(){//one to many between track & course
        return $this->belongsTo('App\Models\Track');
    }
    public function videos(){//one to many between course & video
        return $this->hasMany('App\Models\Video');
    }
    public function quizzes(){//one to many between course & quiz
        return $this->hasMany('App\Models\Quiz');
    }

}
