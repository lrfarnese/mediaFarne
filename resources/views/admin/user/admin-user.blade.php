@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0 fw-semibold">Administrativo Usuários</h4>
        
    </div>
    @if(session('sucesso'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('erro'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('erro') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="GET" action="" class="mb-3">
        <div class="input-group input-group-sm" style="max-width: 420px;">
            <input
                type="text"
                class="form-control"
                name="keyword"
                placeholder="Nome, email ou data de nascimento"
                value="{{ request('keyword') }}"
            >
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 small">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">#</th>
                            <th>Nome</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Nascimento</th>
                            <th>Criado em</th>
                            <th class="text-end pe-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="ps-3 text-muted">{{ $user->id }}</td>
                                <td class="fw-medium">{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->type === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                        {{ $user->type }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($user->data_nascimento)->format('d/m/Y') }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="text-end pe-3">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('perfil', encrypt($user->id)) }}"
                                           class="btn btn-outline-warning" title="Visualizar Perfil">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.user.edit',encrypt($user->id) ) }}"
                                           class="btn btn-outline-primary" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy', encrypt($user->id)) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Nenhum usuário encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>

    <a href="{{ route('admin.user.create') }}"
        class="btn btn-primary rounded-circle shadow position-fixed d-flex align-items-center justify-content-center"
        style="width: 56px; height: 56px; bottom: 32px; right: 32px; z-index: 999; font-size: 22px;">
        <i class="bi bi-plus-lg"></i>
    </a>

</div>
@endsection