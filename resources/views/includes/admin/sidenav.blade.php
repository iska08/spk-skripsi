<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <hr class="bs-sidenav-bar">
            <div class="nav">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-home"></i>
                    </div>
                    <b>Dashboard</b>
                </a>
                {{-- Dropdown Master Data --}}
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/data/*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse"
                    aria-expanded="false">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <b>Master Data</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse" id="masterDataCollapse" data-bs-parent="#sidenavAccordion">
                    <a class="nav-link {{ Request::is('dashboard/data/kriteria*') ? 'active' : '' }} child"
                        href="{{ route('kriteria.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Kriteria
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/data/wisata*') ? 'active' : '' }} child"
                        href="{{ route('wisata.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Destinasi Wisata
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/data/jenis*') ? 'active' : '' }} child"
                        href="{{ route('jenis.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Jenis Wisata
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/data/alternatif*') ? 'active' : '' }} child"
                        href="{{ route('alternatif.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Alternatif
                    </a>
                </div>
                {{-- Dropdown Saran --}}
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/sarans*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse1"
                    aria-expanded="false">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <b>Master Saran</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse" id="masterDataCollapse1" data-bs-parent="#sidenavAccordion">
                    @can('admin')
                    <a class="nav-link {{ Request::is('dashboard/sarans*') ? 'active' : '' }} child"
                        href="{{ route('sarans.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Validasi Saran Wisata
                    </a>
                    @elseif('user')
                    <a class="nav-link {{ Request::is('dashboard/sarans*') ? 'active' : '' }} child"
                        href="{{ route('sarans.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Saran Destinasi Wisata
                    </a>
                    @endcan
                </div>
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/perhitungan*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse2"
                    aria-expanded="false">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-ranking-star"></i>
                    </div>
                    <b>Master SPK</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse" id="masterDataCollapse2" data-bs-parent="#sidenavAccordion">
                    <a class="nav-link {{ Request::is('dashboard/perhitungan/metode*') ? 'active' : '' }} child"
                        href="{{ route('kombinasi.awal') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Metode SPK
                    </a>
                    @can('admin')
                    <a class="nav-link {{ Request::is('dashboard/perhitungan/setting*') ? 'active' : '' }} child"
                        href="{{ route('kombinasi.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Perhitungan
                    </a>
                    @endcan
                </div>
                {{-- Master Pengguna --}}
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/pengguna*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse3"
                    aria-expanded="false">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-user-gear"></i>
                    </div>
                    <b>Master Pengguna</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse" id="masterDataCollapse3" data-bs-parent="#sidenavAccordion">
                    @can('admin')
                    <a class="nav-link {{ Request::is('dashboard/pengguna/users*') ? 'active' : '' }} child"
                        href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Pengguna
                    </a>
                    @endcan
                    <a class="nav-link {{ Request::is('dashboard/pengguna/profile*') ? 'active' : '' }} child"
                        href="{{ route('profile.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Ubah Profil
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<style>
    .nav-link.active {
        background-color: grey;
    }
    .nav-link.active.child {
        background-color: #343a40;
    }
</style>