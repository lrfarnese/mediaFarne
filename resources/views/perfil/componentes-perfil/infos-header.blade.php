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

            <a href="#" class="btn btn-light border border-secondary-subtle btn-sm w-100 rounded-3 fw-semibold py-2 text-secondary shadow-sm">
                <i class="bi bi-pencil-fill me-2"></i>Editar Perfil
            </a>
        @else
            <button class="btn btn-primary btn-sm w-100 rounded-3 fw-semibold py-2 shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i>Seguir
            </button>
        @endif
    </div>
</div>

<hr class="my-3">
