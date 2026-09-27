<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilApiController extends Controller
{
    
    public function seguindo(Request $request){
        
    
        $usersFriend = $request->user()->seguindo()->get();

        return response()->json([
            'success' => true,
            'data' => $usersFriend
        ]);
    }
}
