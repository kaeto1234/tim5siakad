<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        {{-- LOGO + TEXT --}}
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('mhs.index') }}">
            <img src="{{ asset('img/logo-rpl.png') }}"
                 alt="Logo RPL"
                 class="me-2"
                 style="width: 38px; height: 38px; object-fit: cover; border-radius: 50%;">
            <span>SIAKAD MAHASISWA</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mhs.index') ? 'active' : '' }}"
                       href="{{ route('mhs.index') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mhs.absen') ? 'active' : '' }}"
                       href="{{ route('mhs.absen') }}">
                        Absen
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mhs.jadwal') ? 'active' : '' }}"
                       href="{{ route('mhs.jadwal') }}">
                        Jadwal
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mhs.profil') ? 'active' : '' }}"
                       href="{{ route('mhs.profil') }}">
                        Profil
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
