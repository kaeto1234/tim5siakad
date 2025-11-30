<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absen Mahasiswa - SIAKAD</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="topbar">
    <h1>SIAKAD - Mahasiswa</h1>
    <nav>
      <a href="index.html">Dashboard</a>
      <a href="absen.html" class="active">Absen</a>
      <a href="jadwal.html">Jadwal</a>
      <a href="profil.html">Profil</a>
    </nav>
  </header>

  <main class="container">
    <h2>Absen Perkuliahan Hari Ini</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Mata Kuliah</th>
          <th>Dosen</th>
          <th>Jam</th>
          <th>Ruang</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="absen-table-body">
        <!-- data diisi dari JS -->
      </tbody>
    </table>
  </main>

  <script src="assets/js/absen.js"></script>
</body>
</html>
