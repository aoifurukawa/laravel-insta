<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public function posts(){
    //     return $this->belongsTo(Post::class);
    // }
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }
}
