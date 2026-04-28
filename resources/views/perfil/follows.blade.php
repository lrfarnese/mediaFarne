@extends('layouts.main')

@section('content')

@php
$titulo = request()->routeIs('perfil.seguindo') ? 'Seguindo' : 'Seguidores';

$pessoas = [
    ['username' => 'joao.souza',    'nome' => 'João Souza',       'seguindo' => true],
    ['username' => 'maria.lima',    'nome' => 'Maria Lima',       'seguindo' => false],
    ['username' => 'carlos.mendes', 'nome' => 'Carlos Mendes',    'seguindo' => true],
    ['username' => 'julia.ramos',   'nome' => 'Julia Ramos',      'seguindo' => false],
    ['username' => 'pedro.alves',   'nome' => 'Pedro Alves',      'seguindo' => true],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
    ['username' => 'leticia.fb',    'nome' => 'Leticia Ferreira', 'seguindo' => false],
];
@endphp

<div class="container py-4" style="max-width: 480px;">

    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('perfil') }}" class="text-dark text-decoration-none">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <h6 class="mb-0 fw-bold fs-5">{{ $titulo }}</h6>
    </div>

    <div class="d-flex flex-column gap-3" style="max-height: 70vh; overflow-y: auto; padding-right: 4px;">
        @foreach ($pessoas as $pessoa)
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-secondary-subtle flex-shrink-0"
                         style="width: 48px; height: 48px;"></div>
                    <div>
                        <p class="mb-0 fw-semibold" style="font-size: 14px;">{{ $pessoa['nome'] }}</p>
                        <p class="mb-0 text-muted" style="font-size: 12px;">{{ $pessoa['username'] }}</p>
                    </div>
                </div>

                @if($pessoa['seguindo'])
                    <button class="btn btn-outline-secondary btn-sm px-3" style="font-size: 13px; border-radius: 8px;">
                        Seguindo
                    </button>
                @else
                    <button class="btn btn-dark btn-sm px-3" style="font-size: 13px; border-radius: 8px;">
                        Seguir
                    </button>
                @endif
            </div>

            @if(!$loop->last)
                <hr class="my-0 text-muted opacity-25">
            @endif
        @endforeach
    </div>

</div>

@endsection