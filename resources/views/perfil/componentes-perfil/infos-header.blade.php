<div class="d-flex flex-column gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 text-muted small">
        <i class="bi bi-cake2-fill"></i>
        <span>{{ $user->data_nascimento }}</span>
    </div>
    <div class="d-flex align-items-center gap-2 text-muted small">
        <i class="bi bi-calendar3"></i>
        <span>{{ $user->created_at }}</span>
    </div>

    <div class="mt-2">
        @if(auth()->check() && auth()->id() === $user->id)

            <a href="#" class="btn btn-light border border-secondary-subtle btn-sm w-100 rounded-3 fw-semibold py-2 text-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="bi bi-pencil-fill me-2"></i>Editar Perfil
            </a>
        @else


            @if (auth()->user()->estaSeguindo($user))
                <form action="{{ route('perfil.deixarDeSeguir', encrypt($user->id)) }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm w-100 rounded-3 fw-semibold py-2 shadow-sm">
                        <i class="bi bi-person-check-fill me-2"></i>Seguindo
                    </button>
                </form>
            @else
                <form action="{{ route('perfil.seguir', encrypt($user->id)) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm w-100 rounded-3 fw-semibold py-2 shadow-sm">
                        <i class="bi bi-person-plus-fill me-2"></i>Seguir
                    </button>
                </form>
            @endif
            



        @endif
    </div>
</div>

<hr class="my-3">

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <form action="{{ route('perfil.update', encrypt($user->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
               @method('PUT')
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold" id="editProfileModalLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    {{-- Foto/ícone de perfil --}}
                    <div class="d-flex flex-column align-items-center mb-4">
                        <label for="foto" class="position-relative" style="cursor: pointer;">
                            <img id="fotoPreview"
                                 src="{{ $user->url_foto_perfil ? asset('storage/'.$user->url_foto_perfil) : asset('img/default-avatar.png') }}"
                                 class="rounded-circle border border-2 border-secondary-subtle"
                                 width="90" height="90"
                                 style="object-fit: cover;">
                            <span class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                  style="width: 30px; height: 30px;">
                                <i class="bi bi-camera-fill" style="font-size: 14px;"></i>
                            </span>
                        </label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="d-none" onchange="previewFoto(this)">
                        @error('foto')
                            <small class="text-danger mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div class="mb-3">
                        <label for="username" class="form-label small fw-semibold text-muted">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-at"></i></span>
                            <input 
                                type="text" 
                                name="username" 
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username', $user->username) }}" required>
                        </div>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    
                </div>

                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light border rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary rounded-3 fw-semibold px-4">Salvar</button>
                </div>
                <input type="hidden" name="_modal" value="editProfileModal">
            </form>
        </div>
    </div>
</div>

<script>
    function previewFoto(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => document.getElementById('fotoPreview').src = e.target.result;
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
