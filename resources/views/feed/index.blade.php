@extends('layouts.feed')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        {{-- 
            col-lg-5 e col-md-8 garantem que no desktop o feed 
            tenha uma largura elegante, parecida com o Instagram.
        --}}
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