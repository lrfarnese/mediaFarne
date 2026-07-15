<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function index($id)
    {

        $user = User::find($id);

        return view('perfil.index', compact('user'));
    }

    public function seguidores()
    {
        return view('perfil.follows');
    }

    public function seguindo()
    {
        return view('perfil.follows');
    }

}
