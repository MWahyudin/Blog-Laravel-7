<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name','slug'];

    public function posts(){
        //many to many
        return $this->belongsToMany(Post::class);
    }
}