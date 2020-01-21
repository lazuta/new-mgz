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
        return $this->belongsTo('App\RewiewersTypes', 'reviewers_types_id', 'id');
    }

    public function file()
    {
        return $this->hasMany('App\File', 'id');
    }
}
