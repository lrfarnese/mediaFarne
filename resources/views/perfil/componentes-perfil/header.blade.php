<div class="d-flex align-items-center gap-4 mb-3 flex-wrap">

    {{-- Avatar --}}
    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 border overflow-hidden"
     style="width:90px; height:90px;">
        <img src="{{ $user->url_foto_perfil ? asset('storage/' . $user->url_foto_perfil) : asset('images/image.png') }}" 
            alt="{{ $user->username ?? 'Avatar' }}" 
            class="w-100 h-100" 
            style="object-fit: cover;">
    </div>

    {{-- Nome + stats --}}
    <div class="flex-grow-1">

            <h5 class="fw-bold mb-0">{{ $user->name }}</h5></a>

        <span class="text-muted small">{{'@'. $user->username }}</span>

        <div class="d-flex align-items-center gap-3 mt-3 flex-wrap">
            <div class="text-center">
                <div class="fw-bold">{{ $user->posts->count() }}</div>
                <div class="text-muted small">Posts</div>
            </div>

            <div class="vr"></div>
            <div class="text-center">
                <a href="{{ route('perfil.seguidores', encrypt($user->id)) }}" class="text-decoration-none text-dark">
                    <div class="fw-bold">{{ $user->seguidores()->count() }}</div>
                    <div class="text-muted small">Seguidores</div>
                </a>

            </div>

            <div class="vr"></div>
            <div class="text-center">
                <a href="{{ route('perfil.seguindo', encrypt($user->id))}}" class="text-decoration-none text-dark">
                    <div class="fw-bold">{{$user->seguindo()->count()}}</div>
                    <div class="text-muted small">Seguindo</div>
                </a>

            </div>
        </div>
    </div>
</div>
