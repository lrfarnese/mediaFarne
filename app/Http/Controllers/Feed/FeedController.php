<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(){

    $posts = Post::all();

    return view('feed.index',compact('posts'));

    }

}
