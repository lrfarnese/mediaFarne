<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $usuarios = User::where('name', 'LIKE', "%{$search}%")
                            ->take(5)
                            ->get();
        } else {
            $usuarios = User::orderBy('created_at', 'desc')->take(5)->get();
        }

        $posts = Post::with('user', 'images')
            ->with(['interactions' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->withCount(['likes', 'dislikes'])
            ->latest()
            ->paginate(15);

        return view('feed.index', compact('posts', 'usuarios'));
    }

    public function postsSeguindo(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $usuarios = User::where('name', 'LIKE', "%{$search}%")
                            ->take(5)
                            ->get();
        } else {
            $usuarios = User::orderBy('created_at', 'desc')->take(5)->get();
        }

        $seguindoIds = auth()->user()->seguindo()->pluck('users.id');

        $posts = Post::whereIn('user_id', $seguindoIds)
            ->with('user', 'images')
            ->with(['interactions' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->withCount(['likes', 'dislikes'])
            ->latest()
            ->paginate(15);

        return view('feed.index', compact('posts', 'usuarios'));
    }

    public function postsCurtidos(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $usuarios = User::where('name', 'LIKE', "%{$search}%")
                            ->take(5)
                            ->get();
        } else {
            $usuarios = User::orderBy('created_at', 'desc')->take(5)->get();
        }

        $posts = Post::whereHas('interactions', function ($query) {
                $query->where('user_id', auth()->id())
                      ->where('type', 'Like');
            })
            ->with('user', 'images')
            ->with(['interactions' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->withCount(['likes', 'dislikes'])
            ->latest()
            ->paginate(15);

        return view('feed.index', compact('posts', 'usuarios'));
    }
}