@extends('layouts.admin')

@section('content-main')
    <h2 class="mb-2">Administrativo Posts</h2>

    <div class="input-group mb-3 mt-1">
        <input 
            type="text" 
            class="form-control"
            name="keyword"
            placeholder="Pesquisa por autor, data criação"
            value=""
        >
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Autor nome</th>
                <th scope="col">Autor userName</th>
                <th scope="col">Data Criação</th>
                <th scope="col">Post Completo</th>
                <th scope="col">Apagar Post</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>teste</td>
                <td>teste</td>
                <td>323/32/3</td>
                <td class="">
                    <button type="submit" class="btn btn-success btn-sm">
                        Post Completo
                    </button>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger btn-sm">
                        Excluir
                    </button>
                </td>
                
            </tr>
        </tbody>
    </table>
@endsection