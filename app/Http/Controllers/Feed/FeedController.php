<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

        $userAleatorios = User::inRandomOrder()->limit(5)->get();

        $posts = Post::with('user','images')
        ->withCount(['likes', 'dislikes'])
        ->latest()
        ->paginate(10);

        return view('feed.index', compact('posts','userAleatorios'));

    }

}
