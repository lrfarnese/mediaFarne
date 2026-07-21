
<nav class="bottom-nav fixed-bottom bg-white border-top shadow-sm">
    <div class="d-flex justify-content-around align-items-center h-130">

        <!-- Home -->
        <a href="{{ route('feed') }}" class="nav-item text-dark text-decoration-none">

            @if (request()->routeIs('perfil'))
                <i class="bi bi-house fs-4"></i>
            @else
                <i class="bi bi-house-fill fs-4"></i>
            @endif


        </a>

        <!-- Criar -->
        <div class="nav-item text-dark text-decoration-none">
            <i class="bi bi-plus-square fs-4"
                data-bs-toggle="modal"
                data-bs-target="#createPostModal"
            ></i>
        </div>

        <!-- Perfil -->
        <a href="{{ route('perfil',encrypt(auth()->user()->id)) }}" class="nav-item text-dark text-decoration-none">

            @if (request()->routeIs('perfil*') && isset($user) && $user->id === auth()->id())
                <i class="bi bi-person-fill fs-4"></i>
            @else
                <i class="bi bi-person fs-4"></i>
            @endif

        </a>

    </div>
</nav>
