<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

        $posts = collect([
            (object)[
                'user' => (object)['name' => 'lucas_herd'],
                'likes_count' => 125,
                'description' => 'Codando o novo layout da FarneMedia! 🚀',
                'hex_color' => '#4e73df', // Azul
                'image_url' => null,
                'create_at'=>'12 de abril'
            ],
            (object)[
                'user' => (object)['name' => 'laravel_master'],
                'likes_count' => 89,
                'description' => 'Testando componentes Blade sem banco de dados.',
                'hex_color' => '#1cc88a', // Verde
                'image_url' => null,
                'create_at'=>'12 de abril'
            ],
            (object)[
                'user' => (object)['name' => 'design_ui'],
                'likes_count' => 256,
                'description' => 'A estética clean é a alma do negócio.',
                'hex_color' => '#f6c23e', // Amarelo
                'image_url' => null,
                'create_at'=>'12 de abril'
            ],
        ]);

    return view('feed.index',compact('posts'));

    }

}
