@extends('layouts.admin')

@section('content-main')
    <h2 class="mb-2">Administrativo Usuários</h2>

    <div class="input-group mb-3 mt-1">
        <input 
            type="text" 
            class="form-control"
            name="keyword"
            placeholder="Pesquisa por nome ou email"
            value=""
        >
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">
                            Editar
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection