<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Interaction;

class InteractionSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        foreach ($posts as $post) {
            // Cada post recebe interações de usuários aleatórios
            $interagentes = $users->where('id', '!=', $post->user_id)
                                  ->random(3);

            foreach ($interagentes as $user) {
                Interaction::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'type'    => rand(0, 1) ? 'Like' : 'Deslike',
                ]);
            }
        }
    }
}