<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class PostController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'postImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'legenda'   => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {

            $post = new Post();
            $post->user_id = auth()->id();
            $post->content = $validated['legenda'] ?? '';
            $post->save();

            $url = $request->file('postImage')->store('posts', 'public');


            $post->images()->create([
                'url' => $url,
            ]);

            DB::commit();

            return redirect()->back()->with('sucesso', 'Post publicado com sucesso!');

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Erro ao criar post: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'exception' => $e
            ]);

            return redirect()->back()->with('falha', 'Falha ao publicar o post!');
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::find(decrypt($id));

            if (!$post) {
                return redirect()->route('perfil', encrypt(auth()->id()))
                    ->with('falha', 'Post não encontrado!');
            }

            // Verificação de autorização no backend (essencial!)
            if (auth()->id() !== $post->user_id) {
                abort(403, 'Ação não autorizada.');
            }

            $post->delete();

            return redirect()->route('perfil', encrypt(auth()->id()))
                ->with('sucesso', 'Post apagado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->route('perfil', encrypt(auth()->id()))
                ->with('falha', 'Erro ao apagar o post!');
        }
    }



}
