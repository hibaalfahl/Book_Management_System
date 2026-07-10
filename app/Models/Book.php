<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author','published_year','is_available'];

    public function cover(){
        return $this->hasOne(Cover::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'book_category');
    }
}
