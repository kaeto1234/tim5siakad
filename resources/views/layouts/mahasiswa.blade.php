<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIAKAD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex" style="min-height: 100vh">

    {{-- Sidebar --}}
    <aside class="bg-dark text-white p-3" style="width: 250px">
        <h5 class="mb-4">SIAKAD</h5>
        <ul class="nav flex-column gap-2">
            <li><a href="{{route('mahasiswa.dashboard')}}" class="nav-link text-white">Dashboard</a></li>
            <li><a href="{{route('mahasiswa.jadwal')}}" class="nav-link text-white">Jadwal</a></li>
            <li><a href="{{route('mahasiswa.nilai')}}" class="nav-link text-white">Nilai</a></li>
        </ul>
    </aside>

    {{-- Main --}}
    <div class="flex-grow-1">
        {{-- Navbar --}}
        <nav class="navbar navbar-light bg-light px-4">
            <span class="navbar-text">
                Admin Akademik
            </span>
            <a href="#" class="btn btn-outline-danger btn-sm">Logout</a>
        </nav>

        {{-- Content --}}
        <main class="p-4">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>