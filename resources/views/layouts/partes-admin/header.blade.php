<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
            </a>
        </li>
        <li class="nav-item d-none d-md-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--Lupinha de pesquisa-->
        <ul class="navbar-nav ms-auto">
        <!--begin::Navbar Search-->
        
        <!--end::Navbar Search-->


        <!--Botão que deixa pag cheia-->
        <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
        </li>
        <!--end::Fullscreen Toggle-->

        <!--Entra no menu quando clica no nome usuario-->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <span class="rounded-circle border overflow-hidden d-inline-block me-2"
                    style="width: 38px; height: 38px;">
                    <img
                        src="{{ auth()->user()->url_foto_perfil ? asset('storage/' . auth()->user()->url_foto_perfil) : asset('images/image.png') }}"
                        class="w-100 h-100"
                        style="object-fit: cover;"
                        alt="{{ auth()->user()->name }}"
                    />
                </span>
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--begin::User Image-->
            
            <!--end::User Image-->
            <!--begin::Menu Body-->
            
            <!--end::Menu Body-->
            <!--begin::Menu Footer-->
            <li class="user-footer">
                <a href="{{ route('feed') }}" class="btn btn-outline-secondary">
                    Visualizar Site
                </a>

                <form action="{{ route('logout') }}" method="POST" class="d-inline float-end">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Sair
                    </button>
                </form>
            </li>
            <!--end::Menu Footer-->
            </ul>
        </li>
        <!--end::User Menu Dropdown-->
        </ul>

        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
    </nav>