<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgPosts extends Model
{
    protected $fillable = ['post_id', 'url'];

    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
