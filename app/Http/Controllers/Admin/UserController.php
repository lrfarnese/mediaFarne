<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $users = User::withCount('posts')
                ->latest()
                ->paginate(30);

    return view('admin.user.admin-user',compact('users'));
    }

    public function destroy($id)
    {
        try {
            $user = User::find(decrypt($id));

            if (!$user) {
                return redirect()->route('admin.user')
                                ->with('erro', 'Usuário não encontrado.');
            }

            $user->delete();

            return redirect()->route('admin.user')
                            ->with('sucesso', 'Usuário deletado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->route('admin.user')
                            ->with('erro', 'Erro ao deletar usuário!');
        }
    }
}
