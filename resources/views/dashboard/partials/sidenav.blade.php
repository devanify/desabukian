<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link {{ request()->is('dashboard') ? 'active fw-bold text-white' : '' }}" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link {{ request()->is('dashboard/post*') ? 'active fw-bold text-white' : '' }}" href="{{ route('posts.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                        Artikel
                    </a>
                    <a class="nav-link {{ request()->is('dashboard/pengumuman*') ? 'active fw-bold text-white' : '' }}" href="{{ route('pengumuman.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                        Pengumuman
                    </a>
                    <a class="nav-link {{ request()->is('dashboard/pengurusdesa*') ? 'active fw-bold text-white' : '' }}" href="{{ route('pengurusdesa.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Aparatur Desa
                    </a>
                    <a class="nav-link {{ request()->is('dashboard/galeri*') ? 'active fw-bold text-white' : '' }}" href="{{ route('galeri.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Galeri
                    </a>
                    <a class="nav-link {{ request()->is('dashboard/infografis*') ? 'active fw-bold text-white' : '' }}" href="{{ route('infografis.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                        Infografis
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <div class="d-flex justify-content-start align-items-center my-2">
                    <i class="fas fa-user mx-2"></i> Admin Desa Bukian
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
