<nav class="navbar px-3 fixed-top mb-15" style="background: linear-gradient(135deg, #012863 0%, #6099df 60%, #0748a8 100%);">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Esquerda -->
        {{-- <button type="button"
                class="btn btn-light rounded-circle"
                data-bs-toggle="modal"
                data-bs-target="#createPostModal">
            <span class="bi bi-plus"></span>
        </button> --}}

        <!-- Centro -->
        <div class="mx-auto text-decoration-none">
            <span class="fw-bold text-white"
                style="font-size: 24px; letter-spacing: 1px; text-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                <span class="bi bi-image"></span>
                MediaFarne
                <span class="bi bi-pen-fill"></span>
            </span>

        </div>
        <!-- Direita -->
        <div class="dropdown">
            <button class="btn btn-light rounded-circle"
                    type="button"
                    data-bs-toggle="dropdown">
                <i class="bi bi-person"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                    <li><a class="dropdown-item" href="{{ route('feed') }}">Feed Principal</a></li>
                    <li><a class="dropdown-item" href="{{ route('perfil',auth()->user()->id) }}">Meu perfil</a></li>
                    <li><a class="dropdown-item" href="">Editar Perfil</a></li>


                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">Sair</button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>


<style>
    body {
        /* Ajuste esse valor de acordo com a altura da sua navbar */
        padding-top: 70px;
        background-color: #fafafa;
    }
    /* Se a sua barra de baixo também for fixa, use: */
    .fixed-bottom-padding {
        padding-bottom: 80px;
    }
</style>
