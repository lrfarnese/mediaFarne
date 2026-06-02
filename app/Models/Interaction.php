<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = ['user_id', 'post_id', 'type'];

    // Usuário que interagiu
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Post que recebeu a interação
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}
