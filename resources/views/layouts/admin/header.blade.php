<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold" style="color: var(--primary-color);" id="sidebarMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3 d-flex flex-column" style="height: 100%;">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.index') }}" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-user me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-user me-2"></i> Profil
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('admin.tim') }}" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-users me-2"></i> Daftar Karyawan
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-box-open me-2"></i> Produk
                </a>
            </li>
        </ul>
        <ul class="nav flex-column mt-auto">
            <li class="nav-item mb-2">
                <a href="/auth/logout" class="nav-link text-dark fw-semibold">
                    <i class="fas fa-sign-out me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>