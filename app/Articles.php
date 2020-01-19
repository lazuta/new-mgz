<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{   
    protected $fillable = [
        'title', 'user_id', 'reviewers_types_id'
    ];

    public function rewiewerType()
    {
        return $this->hasOne('App\RewiewersTypes');
    }

    public function files()
    {
        return $this->hasMany('App\Files');
    }
}
