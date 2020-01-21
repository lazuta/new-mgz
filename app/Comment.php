<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    protected $table = 'comments';

    protected $fillable = [
        'body', 'approved', 'reviews_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_id', 'id');
    }

    public function review()
    {
        return $this->belongsToMany('App\Reviewer', 'reviews_id', 'id');
    }
}
