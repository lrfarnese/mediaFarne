@extends('layouts.main')
@section('content')
<div class="container py-4" style="max-width: 480px;">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('feed') }}" class="text-dark text-decoration-none">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <h6 class="mb-0 fw-bold fs-5">{{ $titulo }}</h6>
    </div>
    <div class="d-flex flex-column gap-3" style="max-height: 70vh; overflow-y: auto; padding-right: 4px;">
        @foreach ($usersFriend as $user)
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle flex-shrink-0 border overflow-hidden" style="width: 48px; height: 48px;">
                        <img src="{{ $user->url_foto_perfil ? asset('storage/' . $user->url_foto_perfil) : asset('images/image.png') }}"
                            alt="{{ $user->username ?? 'Avatar' }}"
                            class="w-100 h-100"
                            style="object-fit: cover;">
                    </div>
                    <div>
                        <a  
                        class="text-decoration-none text-reset"
                         href="{{ route('perfil', encrypt($user->id)) }}"
                        >
                            <p class="mb-0 fw-semibold" style="font-size: 14px;">{{ $user->name }}</p>
                            <p class="mb-0 text-muted" style="font-size: 12px;">{{ $user->username }}</p>
                        </a>
                           
                        
                            
                        </a>
                    </div>
                </div>
                @if(in_array($user->id, $seguindoIds))
                    <form action="{{ route('perfil.deixarDeSeguir', encrypt($user->id)) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm px-3" style="font-size: 13px; border-radius: 8px;">
                            Seguindo
                        </button>
                    </form>
                @else
                    <form action="{{ route('perfil.seguir', encrypt($user->id)) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-sm px-3" style="font-size: 13px; border-radius: 8px;">
                            Seguir
                        </button>
                    </form>
                @endif
            </div>
            @if(!$loop->last)
                <hr class="my-0 text-muted opacity-25">
            @endif
        @endforeach
    </div>
</div>
@endsection