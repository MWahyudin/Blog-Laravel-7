<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //SoftDelete
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['judul', 'kategori_id', 'content', 'gambar','slug','user_id'];

    public function kategori()
    {
        // return $this->belongsTo('App\Kategori');
        //one to many
        return $this->belongsTo(Kategori::class);
        
    }

    public function tags(){
         //many to many
        return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}