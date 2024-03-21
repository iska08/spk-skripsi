<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <hr class="bs-sidenav-bar">
            <div class="nav">
                <a class="nav-link {{ Request::is('spk') ? 'active' : '' }}"
                    href="{{ route('free.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    Dashboard
                </a>
                {{-- Master Data --}}
                <div class="sb-sidenav-menu-heading">Master Data</div>
                {{-- kriteria --}}
                <a class="nav-link {{ Request::is('spk/kriteria*') ? 'active' : '' }}"
                    href="{{ route('free.kriteria') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    Data Kriteria
                </a>
                {{-- Data Destinasi Wisata --}}
                <a class="nav-link {{ Request::is('spk/wisata*') ? 'active' : '' }}"
                    href="{{ route('free.wisata') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    Data Destinasi Wisata
                </a>
                {{-- Master User --}}
                <a class="nav-link {{ Request::is('spk/alternatif*') ? 'active' : '' }}"
                    href="{{ route('free.alternatif') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    Data Alternatif
                </a>
                <a class="nav-link {{ Request::is('spk/perhitungan*') ? 'active' : '' }}"
                    href="{{ route('free.perhitungan') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-ranking-star"></i>
                    </div>
                    Metode SPK
                </a>
            </div>
        </div>
    </nav>
</div>