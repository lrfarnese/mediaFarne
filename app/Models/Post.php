<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ImgPosts::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function likes()
    {
        return $this->hasMany(Interaction::class)->where('type', 'Like');
    }

    public function dislikes()
    {
        return $this->hasMany(Interaction::class)->where('type', 'Deslike');
    }

}
