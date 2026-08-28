<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use App\Models\Post;
use Illuminate\Http\Request;

class InteractionsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'type' => 'required|in:Like,Deslike',
        ]);

        $userId = auth()->id();
        $type = $request->input('type');

        // Verifica se o usuário já interagiu com esse post
        $interaction = Interaction::where('user_id', $userId)
            ->where('post_id', $post->id)
            ->first();

        if ($interaction) {
            if ($interaction->type === $type) {
                // Clicou de novo no mesmo botão -> remove a interação (toggle off)
                $interaction->delete();
                $userReaction = null;
            } else {
                // Trocou de Like para Deslike ou vice-versa
                $interaction->update(['type' => $type]);
                $userReaction = $type;
            }
        } else {
            // Ainda não tinha interagido -> cria
            Interaction::create([
                'user_id' => $userId,
                'post_id' => $post->id,
                'type' => $type,
            ]);
            $userReaction = $type;
        }

        return response()->json([
            'likes' => $post->likes()->count(),
            'dislikes' => $post->dislikes()->count(),
            'userReaction' => $userReaction,
        ]);
    }
}
