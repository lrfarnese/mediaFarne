<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function index($id)
    {
        $user = User::with('posts.images', 'posts.likes', 'posts.dislikes')
            ->findOrFail(decrypt($id));

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


}
