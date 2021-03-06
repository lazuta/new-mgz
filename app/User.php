<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'password', 'reviewer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function article()
    {
        return $this->hasMany('App\Article', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'id');
    }

    public function reviewers()
    {
        return $this->hasMany('App\UserReviewer', 'id');
    }

    public function reviewer()
    {
        return $this->hasMany('App\Reviewer', 'id');
    }

    public function articleReview()
    {
        return $this->hasMany('App\ArticleReview', 'id');
    }

}
