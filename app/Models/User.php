<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
    } 
    public function saved_posts() {
        return $this->belongsToMany('App\Post' , 'saves');
    }
    public function liked_posts() {
        return $this->belongsToMany('App\Post' , 'likes');
    }
    public function user_comments() {
        return $this->belongsToMany('App\Post' , 'comments');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
