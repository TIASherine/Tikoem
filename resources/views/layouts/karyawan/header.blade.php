<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets-admin/img/icons/Logo.png') }}" alt="Logo">
            <div class="logo-text">
                Tikoem
                <small class="text-muted d-block" style="font-size: 0.65rem; font-weight: 500;"> Kafe GSG </small>
            </div>
        </a>

        <!-- Toggle Button -->
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <i class="fas fa-bars"></i> Menu
        </button>

    </div>
</nav>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold" style="color: var(--primary-color);" id="sidebarMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3 d-flex flex-column" style="height: 100%;">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="{{ route('karyawan.dashboard') }}" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-user me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-user me-2"></i> Profil
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('product.index') }}" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-box-open me-2"></i> Produk
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('karyawan.index') }}" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-clipboard me-2"></i> Pesanan
                </a>
            </li>
        </ul>
        <ul class="nav flex-column mt-auto">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link text-dark fw-semibold border-0 bg-transparent">
                    <i class="fas fa-sign-out me-2"></i> Logout
                </button>
            </form>
        </ul>
    </div>
</div>