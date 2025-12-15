<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIAKAD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 6px;
        }
    </style>
</head>

<body>

    <div class="d-flex" style="min-height: 100vh">

        {{-- Sidebar --}}
        <aside class="bg-dark text-white p-3" style="width: 250px">
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('img/logo-rpl.png') }}" alt="Logo RPL" width="60" height="60" class="me-2">
                <div class="lh-sm">
                    <div class="fw-semibold fs-6 text-light">Sistem</div>
                    <div class="fw-bold fs-4 text-white">Akademis</div>
                </div>

            </div>
            <ul class="nav flex-column gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active text-white fw-bold' : 'text-white' }}">
                        Dashboard
                    </a>

                </li>

                <li class="text-secondary small mt-3">MASTER DATA</li>

                <li>
                    <a href="{{ route('admin.jurusan.index') }}" class="nav-link text-white">
                        Jurusan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.prodi.index') }}" class="nav-link text-white">
                        Prodi
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kelas.index') }}" class="nav-link text-white">
                        Kelas
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.semester.index') }}" class="nav-link text-white">
                        Semester
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mata_kuliah.index') }}" class="nav-link text-white">
                        Mata Kuliah
                    </a>
                </li>
                <li><a href="{{ route('admin.ruangan.index') }}" class="nav-link text-white">
                        Ruangan
                    </a>
                </li>

                <li class="text-secondary small mt-3">AKADEMIK</li>

                <li>
                    <a href="{{ route('admin.kelas_semester.index') }}" class="nav-link text-white">
                        Kelas Semester
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dosen.index') }}" class="nav-link text-white">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link text-white">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jadwal.index') }}" class="nav-link text-white">
                        Jadwal
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan.akademik') }}" class="nav-link text-white">
                        Laporan Akademik
                    </a>
                </li>


            </ul>
        </aside>

        {{-- Main --}}
        <div class="flex-grow-1">
            {{-- Navbar --}}
            <nav class="navbar navbar-light bg-light px-4">
                <span class="navbar-text">
                    Admin Akademik
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">
                        Logout
                    </button>
                </form>
            </nav>

            {{-- Content --}}
            <main class="p-4">
                @yield('content')
            </main>
        </div>

    </div>

</body>

</html>
