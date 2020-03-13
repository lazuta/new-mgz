<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    protected $fillable = [
        'title', 'user_id', 'reviewers_types_id'
    ];

    public function rewiewerType()
    {
        return $this->belongsTo('App\RewiewerType', 'reviewers_types_id', 'id');
    }

    public function file()
    {
        return $this->hasMany('App\File', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function reviewer()
    {
        return $this->hasOne('App\Reviewer', 'id');
    }
}
