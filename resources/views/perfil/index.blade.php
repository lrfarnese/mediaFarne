@extends('layouts.main')

@push('styles')
    @vite('resources/css/css-perfil.css')
@endpush

@section('content')

    <div class="container py-4" style="max-width: 820px;">

        {{-- ===== HEADER DO PERFIL ===== --}}
        @include('perfil.componentes-perfil.header')

        {{-- ===== INFORMAÇÕES ===== --}}

        @include('perfil.componentes-perfil.infos-header')

        {{-- ===== TÍTULO DA SEÇÃO ===== --}}
        <p class="text-muted small fw-semibold text-uppercase mb-2 d-flex align-items-center gap-1">
            <i class="bi bi-grid-3x3"></i> Publicações
        </p>

        {{-- ===== GRID DE POSTS ===== --}}

        @include('perfil.componentes-perfil.grid-posts')

    </div>

@endsection
