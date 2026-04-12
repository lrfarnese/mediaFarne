@vite('resources/css/css-feed/css-nav-bottom.css')
<nav class="bottom-nav fixed-bottom bg-white border-top shadow-sm">
    <div class="d-flex justify-content-around align-items-center h-100">

        <!-- Home -->
        <a href="{{ route('feed') }}" class="nav-item text-dark text-decoration-none">
            <i class="bi bi-house fs-4"></i>
        </a>

        <!-- Criar -->
        <div class="nav-item text-dark text-decoration-none">
            <i class="bi bi-plus-square fs-4"
                data-bs-toggle="modal"
                data-bs-target="#createPostModal"
            ></i>
        </div>
        
        <!-- Perfil -->
        <a href="#" class="nav-item text-dark text-decoration-none">
            <i class="bi bi-person fs-4"></i>
        </a>

    </div>
</nav>