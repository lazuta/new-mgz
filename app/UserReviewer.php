<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReviewer extends Model
{
    protected $table = 'user_reviewers';

    protected $fillable = [
        'user_id', 'reviewers_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function review()
    {
        return $this->belongsTo('App\Reviewer', 'reviewers_id', 'id');
    }
}
