<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RewiewersTypes extends Model
{   
    public $table = "reviewers_types";

    protected $fillable = [
        'title', 'subsidiary'
    ];

    public function article()
    {
        return $this->hasMany('App\Atricle');
    }
}
