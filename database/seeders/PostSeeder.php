<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\ImgPost;
use App\Models\ImgPosts;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Imagens públicas do Picsum — cada URL é uma foto diferente
        $imagens = [
            'https://picsum.photos/seed/praia/600/600',
            'https://picsum.photos/seed/cidade/600/600',
            'https://picsum.photos/seed/natureza/600/600',
            'https://picsum.photos/seed/montanha/600/600',
            'https://picsum.photos/seed/floresta/600/600',
            'https://picsum.photos/seed/lago/600/600',
            'https://picsum.photos/seed/campo/600/600',
            'https://picsum.photos/seed/por-do-sol/600/600',
            'https://picsum.photos/seed/cachoeira/600/600',
            'https://picsum.photos/seed/neve/600/600',
            'https://picsum.photos/seed/deserto/600/600',
            'https://picsum.photos/seed/oceano/600/600',
        ];

        $legendas = [
            'Uma tarde incrível no parque! 🌿',
            'Momentos que ficam na memória ✨',
            'Nada melhor que um dia assim 😊',
            'Aproveitando cada segundo 🌅',
            'Que lugar incrível esse! 😍',
            'Dias assim fazem valer a pena 🌸',
        ];

        // Cria 2 posts por usuário (user_id 1 ao 6)
        for ($userId = 1; $userId <= 6; $userId++) {
            for ($i = 0; $i < 2; $i++) {
                $post = Post::create([
                    'user_id' => $userId,
                    'content' => $legendas[array_rand($legendas)],
                ]);

                ImgPosts::create([
                    'post_id' => $post->id,
                    'url'     => $imagens[array_rand($imagens)],
                ]);
            }
        }
    }
}