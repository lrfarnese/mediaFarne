<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <span class="brand-text fw-light">Admin FarneMedia</span>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('adminDashboard') }}" 
                       class="nav-link {{ request()->routeIs('adminDashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-bar-chart-line-fill"></i>
                        <p>Home Dashboard</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="{{ route('adminUser') }}" 
                       class="nav-link {{ request()->routeIs('adminUser*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item">
                    <a href="{{ route('adminPost') }}" 
                       class="nav-link {{ request()->routeIs('adminPost*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-postage"></i>
                        <p>Posts</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>