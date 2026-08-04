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

            {{--  Card de estatisiticas --}}
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$usersTotal}}</h3>
                            <p>Usuários</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$postsTotal}}</h3>
                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $interacoesTotal }}</h3>
                            <p>Interações Totais</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $usersAdmin }}</h3>
                            <p>Usuários Administradores</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== LINHA PRINCIPAL ===== --}}
            <div class="row g-3 mb-3">

                <div class="col-12 col-lg-8">
                    <div class="card shadow-sm h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-bar-chart-line me-2"></i>Crescimento
                            </h6>
                            <small class="text-muted">Últimos 30 dias</small>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center"
                             style="min-height: 280px; background: #f8f9fa;">
                            <span class="text-muted">[ Gráfico aqui ]</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-clock-history me-2"></i>Posts Recentes
                            </h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center"
                             style="min-height: 280px; background: #f8f9fa;">
                            <span class="text-muted">[ Lista aqui ]</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ===== LINHA SECUNDÁRIA ===== --}}
            <div class="row g-3">

                <div class="col-12 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-person-check me-2"></i>Usuários Recentes
                            </h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center"
                             style="min-height: 180px; background: #f8f9fa;">
                            <span class="text-muted">
                                <div class="card-body p-0">
                                    <table class="table table-sm mb-0">
                                    <thead>
                                        <tr><th>Usuário</th><th>Email</th><th>Cadastro</th></tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuariosRecentes as $user)
                                            <tr>
                                                <td>{{ $user->username ?? $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bi bi-plus-circle me-2"></i>[ Seção livre ]
                            </h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center"
                             style="min-height: 180px; background: #f8f9fa;">
                            <span class="text-muted">[ Conteúdo aqui ]</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection