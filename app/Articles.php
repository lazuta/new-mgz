<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{   
    protected $fillable = [
        'title ', 'posted ', 'user_id', 'reviewers_types_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
