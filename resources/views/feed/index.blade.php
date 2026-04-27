@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="d-flex justify-content-center bg-white p-2 border shadow-sm" style="border-radius: 50px;">
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
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-5">
            
            @forelse($posts as $post)
                <div class="mb-4"> {{-- Margem entre os posts --}}
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
                {{-- Estado vazio quando não houver posts --}}
                <div class="text-center mt-5 text-muted">
                    <i class="bi bi- house-door fs-1"></i>
                    <p class="mt-2">Nada por aqui ainda...</p>
                </div>
            @endforelse

            {{-- Espaço extra no final para o menu inferior não cobrir o último post --}}
            <div style="height: 80px;"></div>

        </div>
    </div>
</div>
@endsection