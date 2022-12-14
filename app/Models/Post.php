<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
