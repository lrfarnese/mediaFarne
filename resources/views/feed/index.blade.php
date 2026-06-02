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
                    <button class="btn btn-primary btn-sm rounded-3 fw-bold py-2 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-arrow-clockwise"></i> Atualizar Feed
                    </button>
                    
                    <button class="btn btn-outline-secondary btn-sm rounded-3 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2 text-start px-3">
                        <i class="bi bi-eye text-muted"></i> Já vistos
                    </button>
                    
                    <button class="btn btn-outline-secondary btn-sm rounded-3 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2 text-start px-3">
                        <i class="bi bi-eye-slash text-muted"></i> Não vistos
                    </button>
                </div>
            </div>

            {{-- Bloco de Paginação Estilizado --}}
            <div class="bg-white border rounded-4 p-3 shadow-sm">
                <h6 class="fw-bold text-muted mb-2" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Navegação</h6>
                <nav aria-label="Navegação de posts">
                    <ul class="pagination pagination-sm m-0 justify-content-between align-items-center">
                        <li class="page-item disabled">
                            <span class="page-link border-0 bg-light rounded-3 fw-semibold text-muted">Anterior</span>
                        </li>
                        <li class="page-item text-muted small fw-medium">
                            Página 1 de 12
                        </li>
                        <li class="page-item">
                            <a class="page-link border-0 bg-light rounded-3 fw-semibold text-primary" href="#">Próxima</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

        {{-- ==================== COLUNA CENTRAL (ROLÁVEL) ==================== --}}
        {{-- A largura reduzida garante que o card do post diminua e caiba melhor verticalmente --}}
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
                        :username="$post->user->name"
                        :likes="$post->likes_count"
                        :deslikes="$post->dislikes_count ?? 0"
                        :legenda="$post->description"
                        :imageColor="$post->hex_color ?? '#e9ecef'"
                        :imageUrl="$post->image_url ?? null"
                        :date="$post->create_at"
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
        {{-- Visível apenas em telas amplas (Desktop XL) para balancear o visual --}}
        <div class="d-none d-xl-block col-xl-3 ms-3 sticky-sidebar">
            
            <div class="bg-white p-3 border rounded-4 shadow-sm">
                <h6 class="fw-bold text-muted mb-3" style="font-size: 13px;">Sugestões para você</h6>
                
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light border rounded-circle" style="width: 32px; height: 32px;"></div>
                        <span class="ms-2 fw-semibold small">usuario_teste</span>
                    </div>
                    <a href="#" class="btn btn-sm text-primary fw-bold p-0" style="font-size: 12px;">Seguir</a>
                </div>
                
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-light border rounded-circle" style="width: 32px; height: 32px;"></div>
                        <span class="ms-2 fw-semibold small">laravel_dev</span>
                    </div>
                    <a href="#" class="btn btn-sm text-primary fw-bold p-0" style="font-size: 12px;">Seguir</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection