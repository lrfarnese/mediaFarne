@extends('layouts.admin')

@section('content')
<div class="container-fluid px-0">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-semibold">Detalhes do Post</h4>
        <a href="{{ route('admin.post') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Voltar para a Lista
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body bg-light rounded py-5 d-flex justify-content-center">
            
            <div style="max-width: 350px; width: 100%;">
                <x-post-card
                    :username="$post->user->username"
                    :id="encrypt($post->user->id)"
                    :postId="$post->id"
                    :fotoPerfil="$post->user->url_foto_perfil"
                    :likes="$post->likes_count"
                    :deslikes="$post->dislikes_count"
                    :legenda="$post->content"
                    :imageUrl="$post->images->isNotEmpty() ? asset('storage/' . $post->images->first()->url) : null"
                    :date="$post->created_at->format('d/m/Y \à\s H:i')"
                    :userReaction="$post->interactions->first()?->type"
                />
            </div>

        </div>
    </div>

</div>
@endsection