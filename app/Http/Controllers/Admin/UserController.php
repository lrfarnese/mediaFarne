<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function index(Request $request)
{
    
    $keyword = $request->input('keyword');

    $users = User::withCount('posts')
        
        ->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('email', 'LIKE', "%{$keyword}%")
                  ->orWhere('username', 'LIKE', "%{$keyword}%");
        })
        ->latest()
        ->paginate(30);

    return view('admin.user.admin-user', compact('users'));
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

    public function edit($id)
    {
        try {
            $user = User::findOrFail(decrypt($id));
            return view('admin.user.edit', compact('user'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->with('erro', 'Usuário não encontrado.');
        }
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class),
                'min:3',
                'regex:/^[a-zA-Z0-9._]+$/',
            ],
            'data_nascimento' => ['required', 'date', 'before:-18 years'],
            'password' => $this->passwordRules(),
            'type' => ['required', 'in:comum,admin'], 
        ])->validate();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'data_nascimento' => $input['data_nascimento'],
            'password' => Hash::make($input['password']),
            'type' => $input['type'],
        ]);

        return redirect()->route('admin.user')
        ->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        try {
            $userId = decrypt($id);
            $user = User::findOrFail($userId);
        } catch (\Throwable $e) {
            return redirect()->route('admin.user')->with('erro', 'Usuário não encontrado.');
        }

        $input = $request->all();


        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($userId),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->ignore($userId),
                'min:3',
                'regex:/^[a-zA-Z0-9._]+$/',
            ],
            'data_nascimento' => ['required', 'date', 'before:-18 years'],
            'type' => ['required', 'in:comum,admin'],
        ])->validate();

        try {
            $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'data_nascimento' => $input['data_nascimento'],
                'type' => $input['type'],
            ]);

            return redirect()->route('admin.user')->with('sucesso', 'Usuário atualizado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->back()
                ->with('erro', 'Erro ao atualizar usuário no banco de dados!')
                ->withInput();
        }
    }


}
