<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    // public function user()
    // {
    //     return $this->belongsToMany('App\User', 'classroom_user', 'classroom_id','user_id');
    // }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
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
