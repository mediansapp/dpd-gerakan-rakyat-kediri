<?php include('config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">DPD Gerakan Rakyat Kota Kediri</a>
    <div>
      <a class="nav-link d-inline text-dark" href="index.php">Beranda</a>
      <a class="nav-link d-inline text-dark" href="berita.php">Berita</a>
      <a class="nav-link d-inline text-dark" href="struktur.php">Struktur</a>
      <a class="nav-link d-inline text-dark" href="galeri.php">Galeri</a>
      <a class="nav-link d-inline text-dark" href="daftar.php">Daftar Anggota</a>
    </div>
  </div>
</nav>

<header class="bg-warning text-dark text-center py-5">
  <h1 class="fw-bold">Selamat Datang di Situs Resmi</h1>
  <p class="lead">Gerakan Rakyat untuk Kediri yang lebih baik</p>
</header>

<div class="container my-5">
  <h3 class="text-center mb-4">Berita Terbaru</h3>
  <div class="row">
    <?php
      $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");
      while($d = mysqli_fetch_array($q)){
        echo "
        <div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='uploads/$d[gambar]' class='card-img-top'>
            <div class='card-body'>
              <h5>$d[judul]</h5>
              <p>".substr($d['isi'],0,100)."...</p>
              <a href='berita.php?id=$d[id]' class='btn btn-warning btn-sm text-dark'>Baca Selengkapnya</a>
            </div>
          </div>
        </div>";
      }
    ?>
  </div>
</div>

<footer class="bg-dark text-light text-center py-3">
  © 2025 DPD Gerakan Rakyat Kota Kediri
</footer>
  <section class="container my-5 text-center">
  <h2 class="text-warning mb-4 reveal">Data Organisasi</h2>
  <div class="row justify-content-center">
    <div class="col-md-3 col-6 mb-4 reveal">
      <div class="stats-box">
        <span class="count-up" data-target="250">0</span>
        <span class="stats-label">Anggota Aktif</span>
      </div>
    </div>
    <div class="col-md-3 col-6 mb-4 reveal">
      <div class="stats-box">
        <span class="count-up" data-target="37">0</span>
        <span class="stats-label">Program Berjalan</span>
      </div>
    </div>
    <div class="col-md-3 col-6 mb-4 reveal">
      <div class="stats-box">
        <span class="count-up" data-target="12">0</span>
        <span class="stats-label">Kegiatan Tahunan</span>
      </div>
    </div>
  </div>
</section>

</body>
</html>
