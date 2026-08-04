<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //Cards
        $usersTotal = User::count();
        $postsTotal = Post::count();
        $usersAdmin = User::where('type', 'admin')->count();
        $interacoesTotal = Interaction::count();
        
        $usuariosRecentes = User::latest()
            ->take(5)
            ->get();


        return view('admin.admin-page', 
        compact(
            'usersTotal',
            'postsTotal',
            'usersAdmin',
            'interacoesTotal',
            'usuariosRecentes'
            ));

    } 
}
