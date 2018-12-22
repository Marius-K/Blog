<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopeUserComments(){
        return static::comments()
            ->leftJoin('posts', 'posts.id', '=', 'comments.post_id')
            ->get(['comment_id', 'comment_body as comment', 'post_id', 'post_title as post']);
    }

}
