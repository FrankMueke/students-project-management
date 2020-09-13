<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function student()
    {
        return $this->belongsToMany('Student');
    }
}
