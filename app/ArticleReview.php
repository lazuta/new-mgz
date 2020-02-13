<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleReview extends Model
{
    protected $table = 'article_reviews';

    protected $fillable = [
        'reviews_id', 'user_id', 'file_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function file()
    {
        return $this->hasMany('App\File', 'id');
    }

    public function review()
    {
        return $this->hasMany('App\Reviewer', 'id');
    }
}
