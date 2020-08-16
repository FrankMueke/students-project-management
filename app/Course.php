<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user()
    {
        return $this->hasMany('User');
    }
    public function posts()
    {
        return $this->hasMany('Post');
    }
    public function classroom()
    {
        return $this->hasMany('Classroom');
    }
}
