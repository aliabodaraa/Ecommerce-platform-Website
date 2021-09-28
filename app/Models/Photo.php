<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table='photoable';
     protected $fillable=[
      'filename','photoable_type','photoable_id'
     ];
    public function photoable(){//one to one polymorphic between photo & (user&course)
        return $this->morphTo('App\Models\Photo');
    }
}
