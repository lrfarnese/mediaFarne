@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0 fw-semibold">Administrativo Posts</h4>
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
                placeholder="Pesquisa por autor, username ou data (AAAA-MM-DD)"
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
                            <th>Autor</th>
                            <th>Username</th>
                            <th class="text-center">Likes / Dislikes</th>
                            <th>Data Criação</th>
                            <th class="text-end pe-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="ps-3 text-muted">{{ $post->id }}</td>
                                <td class="fw-medium">{{ $post->user->name }}</td>
                                <td>{{ $post->user->username }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle me-1" title="Likes">
                                        <i class="bi bi-hand-thumbs-up-fill"></i> {{ $post->likes_count }}
                                    </span>
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle" title="Dislikes">
                                        <i class="bi bi-hand-thumbs-down-fill"></i> {{ $post->dislikes_count }}
                                    </span>
                                </td>
                                <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-end pe-3">
                                    <div class="btn-group btn-group-sm">
                                        
                                        <a href="{{ route('admin.post.view', encrypt($post->id)) }}" class="btn btn-outline-info" title="Ver Post Completo">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.post.destroy', encrypt($post->id)) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este Post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Excluir Post">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Nenhum post encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>

</div>
@endsection