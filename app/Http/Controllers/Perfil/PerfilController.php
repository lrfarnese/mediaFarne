<?php

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    
    public function index()
    {
        
        return view('perfil.index');
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
