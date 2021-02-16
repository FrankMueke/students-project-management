<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }
}
