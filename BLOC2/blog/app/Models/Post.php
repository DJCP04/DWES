<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;


class Post extends Model
{
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
