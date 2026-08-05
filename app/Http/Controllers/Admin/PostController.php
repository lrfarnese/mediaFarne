<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $posts = Post::with('user')
            ->withCount(['likes', 'dislikes'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($userQuery) use ($keyword) {
                    $userQuery->where('name', 'LIKE', "%{$keyword}%")
                              ->orWhere('username', 'LIKE', "%{$keyword}%");
                })
                
                ->orWhere('created_at', 'LIKE', "%{$keyword}%");
            })
            ->latest()
            ->paginate(15);

        return view('admin.post.admin-post', compact('posts'));
    }

    public function destroy($id)
    {
        try {
            $post = Post::find(decrypt($id));

            if (!$post) {
                return redirect()->route('admin.post')
                                 ->with('erro', 'Post não encontrado.');
            }

            $post->delete();

            return redirect()->route('admin.post')
                             ->with('sucesso', 'Post deletado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->route('admin.post')
                             ->with('erro', 'Erro ao deletar post!');
        }
    }
    public function viewPost($id){
        try {
            $post = Post::findOrFail(decrypt($id));
            return view('admin.post.post-view', compact('post'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.post')->with('erro', 'Post não encontrado.');
        }
    }




}