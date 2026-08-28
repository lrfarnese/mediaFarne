@props([
    'username',
    'id' => null,
    'postId',
    'likes',
    'fotoPerfil',
    'deslikes' => 0,
    'legenda',
    'imageUrl' => null,
    'date',
    'userReaction' => null
])
@vite('resources/css/app.css')
<div class="card border-1 mb-4 shadow-sm mx-auto post-card" data-post-id="{{ $postId }}" style="border-radius: 8px; overflow: hidden; background-color: #fff; max-width: 550px; width: 100%;">

    <div class="d-flex align-items-center p-3">
        <a href="{{ route('perfil', $id) }}" class="text-decoration-none text-reset d-flex align-items-center">
            
            <img src="{{ $fotoPerfil ? asset('storage/' . $fotoPerfil) : asset('images/image.png') }}" 
                 alt="{{ $username }}" 
                 class="rounded-circle me-2 border" 
                 style="width: 32px; height: 32px; object-fit: cover;">

            <span class="fw-bold" style="font-size: 14px;">{{ $username }}</span>
        </a>
    </div>

    @if($imageUrl)
        <div style="aspect-ratio: 1/1; overflow: hidden; background-color: #efefef;">
            <img src="{{ $imageUrl }}" class="w-100 h-100" style="object-fit: cover; object-position: center;">
        </div>
    @endif

    <div class="p-3">
        <div class="d-flex align-items-center mb-2">
            <div class="d-flex align-items-center me-4">
                <i class="bi {{ $userReaction === 'Like' ? 'bi-heart-fill text-danger' : 'bi-heart' }} btn-like fs-5 me-2"
                   style="cursor: pointer;"
                   data-post-id="{{ $postId }}"
                   data-type="Like"></i>
                <span class="fw-bold likes-count" style="font-size: 14px;">{{ $likes }}</span>
            </div>

            <div class="d-flex align-items-center">
                <i class="bi {{ $userReaction === 'Deslike' ? 'bi-heartbreak-fill text-primary' : 'bi-heartbreak' }} btn-dislike fs-5 me-2"
                   style="cursor: pointer;"
                   data-post-id="{{ $postId }}"
                   data-type="Deslike"></i>
                <span class="fw-bold dislikes-count" style="font-size: 14px;">{{ $deslikes }}</span>
            </div>
        </div>

        <div style="font-size: 14px;">
            <span class="fw-bold">{{ $username }}</span> {{ $legenda }}
        </div>

        <div class="mt-2 text-muted text-uppercase" style="font-size: 10px; letter-spacing: 0.2px;">
            {{ $date }}
        </div>
    </div>
</div>
@vite('resources/js/app.js')