<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user () {
       return $this->belongsTo('App\User');  
    }
    public function tags () {
        return $this->belongsToMany('App\Tag');
    } 

    // for saves we will not use it
    public function users() {
        return $this->belongsToMany('App\User' , 'saves');
    }
    public function users_like_it() {
        return $this->belongsToMany('App\User' , 'likes');
    }
    public function comments() {
        return $this->belongsToMany('App\User' , 'comments');
    }

}