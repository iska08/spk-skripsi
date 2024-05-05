<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @auth
        <a href="{{ route('portal.index') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0" style="width: 5cm">
            <img src="{{ url('frontend/images/logo-no-background.png') }}" alt="" />
        </a>
        @else
        <a class="btn-getstarted scrollto text-center" href="{{ route('free.index') }}" style="width: 5cm">Perhitungan SPK</a>
        @endauth
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto" href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ url('#about') }}">About</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="{{ url('#faq') }}">FAQ</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav>
        @auth
        <a class="btn-getstarted scrollto text-center" href="{{ route('dashboard.index') }}" style="width: 5cm">My Dashboard</a>
        @else
        <a class="btn-getstarted scrollto text-center" href="{{ route('login.index') }}" style="width: 5cm">Login</a>
        @endauth
    </div>
</header>
<!-- End Header -->