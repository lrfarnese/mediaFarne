<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgPosts extends Model
{
    protected $fillable = ['post_id', 'url'];
    protected $table = "img_posts";

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
