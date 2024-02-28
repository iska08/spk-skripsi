<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <hr class="bs-sidenav-bar">
            <div class="nav">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    Dashboard
                </a>
                {{-- Master Data --}}
                <div class="sb-sidenav-menu-heading">Master Data</div>
                {{-- kriteria --}}
                <a class="nav-link {{ Request::is('dashboard/kriteria*') ? 'active' : '' }}"
                    href="{{ route('kriteria.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    Data Kriteria
                </a>
                {{-- Data Destinasi Wisata --}}
                <a class="nav-link {{ Request::is('dashboard/wisata*') ? 'active' : '' }}"
                    href="{{ route('wisata.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    Data Destinasi Wisata
                </a>
                {{-- Master User --}}
                <a class="nav-link {{ Request::is('dashboard/alternatif*') ? 'active' : '' }}"
                    href="{{ route('alternatif.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    Data Alternatif
                </a>
                <a class="nav-link {{ Request::is('dashboard/kombinasi*') ? 'active' : '' }}"
                    href="{{ route('kombinasi.awal') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-ranking-star"></i>
                    </div>
                    Metode SPK
                </a>
                @can('admin')
                <a class="nav-link {{ Request::is('dashboard/editkombinasi*') ? 'active' : '' }}"
                    href="{{ route('kombinasi.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    Perhitungan
                </a>
                <div class="sb-sidenav-menu-heading">Master Pengguna</div>
                <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user-gear"></i>
                    </div>
                    Data Pengguna
                </a>
                @endcan
                <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}"
                    href="{{ route('profile.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-user-pen"></i>
                    </div>
                    Ubah Profil
                </a>
            </div>
        </div>
    </nav>
</div>