@extends('layouts.main')

@section('content')
    {{-- Estilos para travar a rolagem da tela e liberar apenas o feed central no Desktop --}}
    <style>
        @media (min-width: 768px) {
            .fixed-viewport-row {
                height: calc(100vh - 90px); /* Ocupa a altura da tela descontando a navbar superior */
                overflow: hidden;
            }
            .scrollable-feed {
                height: 100%;
                overflow-y: auto;
                scrollbar-width: none; /* Oculta barra de rolagem no Firefox */
            }
            .scrollable-feed::-webkit-scrollbar {
                display: none; /* Oculta barra de rolagem no Chrome/Safari */
            }
            .sticky-sidebar {
                height: 100%;
                overflow-y: visible;
            }
        }
    </style>

    <div class="container py-3">
        <div class="row justify-content-center fixed-viewport-row">

            {{-- ==================== COLUNA ESQUERDA (FIXA) ==================== --}}
            <div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0 sticky-sidebar">

                {{-- Painel de Controle do Feed --}}
                <div class="bg-white border rounded-4 p-3 shadow-sm mb-4">
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center" style="font-size: 14px;">
                        <i class="bi bi-sliders2 me-2 text-primary"></i> Controlar Feed
                    </h6>

                    <div class="d-grid gap-2">
                        {{-- Botão de Atualizar agora recarrega a rota do feed --}}
                        <a href="{{ route('feed') }}" class="btn btn-primary btn-sm rounded-3 fw-bold py-2 d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-arrow-clockwise"></i> Atualizar Feed
                        </a>

                        <button class="btn btn-outline-secondary btn-sm rounded-3 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2 text-start px-3">
                            <i class="bi bi bi-heart fs-5 me-2"></i> Posts Curtidos
                        </button>

                        <button class="btn btn-outline-secondary btn-sm rounded-3 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2 text-start px-3">
                            <i class="bi bi-heartbreak fs-5 me-2"></i> Posts Descurtidos
                        </button>
                    </div>
                </div>

                {{-- Bloco de Paginação Estilizado Dinâmico --}}
                @if ($posts->hasPages())
                    <div class="bg-white border rounded-4 p-3 shadow-sm mb-4">
                        <h6 class="fw-bold text-muted mb-2" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Navegação</h6>
                        <nav aria-label="Navegação de posts">
                            <ul class="pagination pagination-sm m-0 justify-content-between align-items-center">

                                {{-- Botão Anterior --}}
                                @if ($posts->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link border-0 bg-light rounded-3 fw-semibold text-muted">Anterior</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link border-0 bg-light rounded-3 fw-semibold text-primary" href="{{ $posts->previousPageUrl() }}">Anterior</a>
                                    </li>
                                @endif

                                {{-- Informação da Página Atual --}}
                                <li class="page-item text-muted small fw-medium">
                                    Página {{ $posts->currentPage() }} de {{ $posts->lastPage() }}
                                </li>

                                {{-- Botão Próximo --}}
                                @if ($posts->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link border-0 bg-light rounded-3 fw-semibold text-primary" href="{{ $posts->nextPageUrl() }}">Próxima</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link border-0 bg-light rounded-3 fw-semibold text-muted">Próxima</span>
                                    </li>
                                @endif

                            </ul>
                        </nav>
                    </div>
                @endif

            </div>

            {{-- ==================== COLUNA CENTRAL (ROLÁVEL) ==================== --}}
            <div class="col-12 col-md-8 col-lg-5 col-xl-4 scrollable-feed">

                {{-- Abas Deslizantes Superiores (Explorar / Seguindo) --}}
                <div class="d-flex justify-content-center bg-white p-2 border shadow-sm mb-4" style="border-radius: 50px;">
                    <ul class="nav nav-pills nav-fill w-100" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill fw-bold py-1" style="font-size: 13px;" id="pills-following-tab" data-bs-toggle="pill" type="button">
                                Explorar
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill fw-bold py-1" style="font-size: 13px;" id="pills-global-tab" data-bs-toggle="pill" type="button">
                                Seguindo
                            </button>
                        </li>
                    </ul>
                </div>

                {{-- Feed de Listagem de Posts --}}
                @forelse($posts as $post)
                    <div class="mb-4">
                        <x-post-card
                            :username="$post->user->username"
                            :id="encrypt($post->user->id) "
                            :fotoPerfil="$post->user->url_foto_perfil"
                            :likes="$post->likes->count()"
                            :deslikes="$post->dislikes->count()"
                            :legenda="$post->content"
                            :imageUrl="$post->images->isNotEmpty() ? asset('storage/' . $post->images->first()->url) : null"
                            :date="$post->created_at"
                        />
                    </div>
                @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-house-door fs-1"></i>
                        <p class="mt-2 fw-medium">Nada por aqui ainda...</p>
                    </div>
                @endforelse

                {{-- Margem de respiro inferior para o menu flutuante em celulares --}}
                <div class="d-block d-md-none" style="height: 80px;"></div>
            </div>

            {{-- ==================== COLUNA DIREITA (FIXA) ==================== --}}
            <div class="d-none d-xl-block col-xl-3 ms-3 sticky-sidebar">

                <div class="bg-white p-3 border rounded-4 shadow-sm">
                    <h6 class="fw-bold text-muted mb-3" style="font-size: 13px;">Sugestões para você</h6>

                    @foreach($userAleatorios as $user)
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('perfil', encrypt($user->id)) }}"
                                class="text-decoration-none text-reset d-flex align-items-center"
                                >
                                <div class="rounded-circle flex-shrink-0 border overflow-hidden" style="width: 32px; height: 32px;">
                                    <img src="{{ $user->url_foto_perfil ? asset('storage/' . $user->url_foto_perfil) : asset('images/image.png') }}" 
                                    alt="{{ $user->username ?? 'Avatar' }}" 
                                    class="w-100 h-100" 
                                    style="object-fit: cover;">
                                </div>
                                <span class="ms-2 fw-semibold small">{{$user->name}}</span>

                                </a>
                                
                            </div>
                            <a href="#" class="btn btn-sm text-primary fw-bold p-0" style="font-size: 12px;">Seguir</a>
                        </div>
                    @endforeach


            </div>

        </div>
    </div>
@endsection
