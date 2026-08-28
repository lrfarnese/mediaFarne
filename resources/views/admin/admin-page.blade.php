@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h5 class="mb-0 fw-semibold">Home Dashboard</h5>
            <small class="text-muted">Visão geral da plataforma</small>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            {{-- Card de estatísticas --}}
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-info text-white p-3 rounded shadow-sm">
                        <div class="inner">
                            <h3>{{ $usersTotal }}</h3>
                            <p class="mb-0">Usuários</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-success text-white p-3 rounded shadow-sm">
                        <div class="inner">
                            <h3>{{ $postsTotal }}</h3>
                            <p class="mb-0">Posts</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-danger text-white p-3 rounded shadow-sm">
                        <div class="inner">
                            <h3>{{ $interacoesTotal }}</h3>
                            <p class="mb-0">Interações Totais</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-warning text-dark p-3 rounded shadow-sm">
                        <div class="inner">
                            <h3>{{ $usersAdminCount }}</h3>
                            <p class="mb-0">Administradores</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== LINHA PRINCIPAL ===== --}}
            <div class="row g-3 mb-3">
                
                {{-- Resumo Mensal Simples --}}
                <div class="col-12 col-lg-8">
                    <div class="card shadow-sm h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-bar-chart-line me-2"></i>Resumo do Mês
                            </h6>
                            <small class="text-muted">Mês Atual: {{Carbon\Carbon::now()->month}}</small>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 280px; background: #f8f9fa;">
                            <div class="row w-100 text-center">
                                <div class="col-6 border-end">
                                    <h1 class="text-primary fw-bold display-5">{{ $novosUsuariosMes }}</h1>
                                    <p class="text-muted mb-0">Novos usuários cadastrados</p>
                                </div>
                                <div class="col-6">
                                    <h1 class="text-success fw-bold display-5">{{ $novosPostsMes }}</h1>
                                    <p class="text-muted mb-0">Novos posts criados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lista de Usuários Administradores --}}
                <div class="col-12 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-shield-lock me-2"></i>Administradores
                            </h6>
                        </div>
                        <div class="card-body p-0" style="min-height: 280px; background: #f8f9fa;">
                            <ul class="list-group list-group-flush h-100">
                                @forelse($adminsLista as $admin)
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        {{ $admin->username ?? $admin->name }}
                                        <span class="badge bg-warning text-dark rounded-pill">Admin</span>
                                    </li>
                                @empty
                                    <li class="list-group-item bg-transparent text-center text-muted border-0 mt-4">Nenhum admin encontrado.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ===== LINHA SECUNDÁRIA ===== --}}
            <div class="row g-3">

                {{-- Tabela de Usuários Recentes --}}
                <div class="col-12 col-lg-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-person-check me-2"></i>Usuários Recentes
                            </h6>
                        </div>
                        <div class="card-body p-0 text-center" style="min-height: 180px; background: #f8f9fa;">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Usuário</th>
                                        <th>Email</th>
                                        <th>Cadastro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuariosRecentes as $user)
                                        <tr>
                                            <td>{{ $user->username ?? $user->name }}</td>
                                            <td>{{ Str::limit($user->email, 20) }}</td>
                                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="3" class="text-muted">Nenhum usuário recente.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Usuários Mais Ativos (Mais Posts) --}}
                <div class="col-12 col-lg-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-trophy me-2"></i>Usuários Mais Ativos
                            </h6>
                        </div>
                        <div class="card-body p-0 text-center" style="min-height: 180px; background: #f8f9fa;">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Posição</th>
                                        <th>Usuário</th>
                                        <th>Posts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuariosMaisAtivos as $index => $user)
                                        <tr>
                                            <td><strong class="text-muted">#{{ $index + 1 }}</strong></td>
                                            <td>{{ $user->username ?? $user->name }}</td>
                                            <td><span class="badge bg-success">{{ $user->posts_count }}</span></td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="3" class="text-muted">Nenhum dado disponível.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection