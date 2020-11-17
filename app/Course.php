<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->hasMany('User');
    }
    public function posts()
    {
        return $this->hasMany('Post');
    }
    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }
}
