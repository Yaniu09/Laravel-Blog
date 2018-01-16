<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function photos()
    {
        return $this->hasMany('App\Post_photo', 'post_id');
    }
}
