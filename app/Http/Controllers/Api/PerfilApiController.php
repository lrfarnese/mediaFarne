<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilApiController extends Controller
{
    
    public function seguindo(Request $request)
    {
        $usersFriend = $request->user()->seguindo()
            ->select([
                'users.id',
                'users.name',
                'users.username',
                'users.url_foto_perfil',
                'users.created_at',
            ])
            ->withCount(['posts', 'seguidores', 'seguindo'])
            ->get()
            ->makeHidden('pivot');

        return response()->json([
            'success' => true,
            'data' => $usersFriend,
        ]);
    }
}
