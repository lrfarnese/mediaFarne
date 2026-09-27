<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user', 'images')
            ->withCount(['likes', 'dislikes'])
            ->with(['interactions' => function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            }])
            ->latest()
            ->get();

        $posts->each(function ($post) {
            $post->user_reaction = $post->interactions->first()?->type;

            unset($post->interactions);
        });

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    public function storeInteraction(Request $request, Post $post)
    {
        $validated = $request->validate([
            'type' => ['required', 'in:Like,Deslike'],
        ]);

        $user = $request->user();

        $interaction = Interaction::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($interaction) {

            if ($interaction->type === $validated['type']) {

                $interaction->delete();

                $userReaction = null;

            } else {

                $interaction->update([
                    'type' => $validated['type'],
                ]);

                $userReaction = $validated['type'];
            }

        } else {

            Interaction::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'type' => $validated['type'],
            ]);

            $userReaction = $validated['type'];
        }

        return response()->json([
            'success' => true,
            'data' => [
                'post_id' => $post->id,
                'likes' => $post->likes()->count(),
                'dislikes' => $post->dislikes()->count(),
                'user_reaction' => $userReaction,
            ],
        ]);
    }

    
}
