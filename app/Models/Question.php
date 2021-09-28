<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
     protected $fillable=[
         'title', 'answer', 'right_answer', 'score','quiz_id'
        ];
    public function quiz(){//one to many between quiz & question
        return $this->belongsTo('App\Models\Quiz');
    }
}