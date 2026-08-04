<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class PerfilController extends Controller
{

    public function index($id)
    {
        $user = User::with([
            'posts' => function ($query) {
                $query->latest(); 
            },
            'posts.images',
            'posts.likes',
            'posts.dislikes'
        ])->findOrFail(decrypt($id));

        return view('perfil.index', compact('user'));
    }



    public function seguidores($id)
    {
        $user = User::findOrFail(decrypt($id));

        $titulo = 'Seguidores';
        $usersFriend = $user->seguidores()->get();


        $seguindoIds = auth()->user()->seguindo()->pluck('users.id')->toArray();

        return view('perfil.follows', compact('titulo', 'usersFriend', 'seguindoIds'));
    }

    public function seguindo($id)
    {
        $user = User::findOrFail(decrypt($id));

        $titulo = 'Seguindo';
        $usersFriend = $user->seguindo()->get();

        $seguindoIds = auth()->user()->seguindo()->pluck('users.id')->toArray();

        return view('perfil.follows', compact('titulo', 'usersFriend', 'seguindoIds'));
    }

    public function seguir($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $usuarioLogado = auth()->user();

        if ((int) $usuarioLogado->id === (int) $id) {
            return back()->with('erro', 'Você não pode seguir a si mesmo.');
        }

        if (! $usuarioLogado->estaSeguindo(User::find($id))) {
            $usuarioLogado->seguindo()->attach($id);
        }

        return back()->with('sucesso', 'Agora você está seguindo esse usuário.');
    }

    public function deixarDeSeguir($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        auth()->user()->seguindo()->detach($id);

        return back()->with('sucesso', 'Você deixou de seguir esse usuário.');
    }

   public function update(Request $request, $id)
    {
        
        try {
            $userId = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Identificador inválido.');
        }

        
        if ($userId !== auth()->id()) {
            abort(403, 'Você não tem permissão para editar este perfil.');
        }

        $user = User::findOrFail($userId);

       
        $request->validate([
            'username' => [
                'required',
                'string',
                'min:3',
                'regex:/^[a-zA-Z0-9._]+$/',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id), 
            ],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'], 
        ]);

        $user->username = $request->username;

        
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            
            if ($user->url_foto_perfil && Storage::disk('public')->exists($user->url_foto_perfil)) {
                Storage::disk('public')->delete($user->url_foto_perfil);
            }

            $caminhoFoto = $request->file('foto')->store('foto_perfis', 'public');
            $user->url_foto_perfil = $caminhoFoto;
        }

        
        $user->save();

        return redirect()->back()->with('sucesso', 'Perfil atualizado com sucesso!');
    }
}


