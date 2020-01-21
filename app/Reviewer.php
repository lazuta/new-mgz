<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
        'description', 'mark', 'user_id', 'article_id'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'id');
    }
}
