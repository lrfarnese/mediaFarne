<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        // Cards principais
        $usersTotal = User::count();
        $postsTotal = Post::count();
        $usersAdminCount = User::where('type', 'admin')->count();
        $interacoesTotal = Interaction::count();
        
        // Listas simplificadas (Últimos 5 registros)
        $usuariosRecentes = User::latest()->take(5)->get();
        
        // Lista de 5 Administradores
        $adminsLista = User::where('type', 'admin')->latest()->take(5)->get();

        // 5 Usuários com mais posts
        $usuariosMaisAtivos = User::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();

        
        $mesAtual = Carbon::now()->month;
        $novosUsuariosMes = User::whereMonth('created_at', $mesAtual)->count();
        $novosPostsMes = Post::whereMonth('created_at', $mesAtual)->count();

        return view('admin.admin-page', compact(
            'usersTotal',
            'postsTotal',
            'usersAdminCount', 
            'interacoesTotal',
            'usuariosRecentes',
            'adminsLista',
            'usuariosMaisAtivos',
            'novosUsuariosMes',
            'novosPostsMes'
        ));
    } 
}