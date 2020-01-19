<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{   
    protected $fillable = [
        'title ', 'posted ', 'user_id', 'reviewers_types_id'
    ];
}
