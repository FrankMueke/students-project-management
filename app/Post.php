<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'title', 'body', 'slug',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }
}

