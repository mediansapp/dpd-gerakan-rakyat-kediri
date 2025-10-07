<?php include('config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri Kegiatan - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">DPD Gerakan Rakyat Kota Kediri</a>
  </div>
</nav>

<div class="container my-5">
  <h3 class="text-center mb-4">Galeri Kegiatan</h3>
  <div class="row">
    <?php
      $q = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC");
      while($d = mysqli_fetch_array($q)){
        echo "
        <div class='col-md-3 mb-4'>
          <div class='card'>
            <img src='uploads/$d[gambar]' class='card-img-top'>
            <div class='card-body text-center'>
              <p class='mb-0'>$d[judul]</p>
              <small class='text-muted'>$d[tanggal]</small>
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

  <section class="container text-center my-5">
  <h2 class="text-warning mb-4 reveal">Galeri Kegiatan</h2>

  <div class="slider-container reveal">
    <div class="slide active">
      <img src="img/default.jpg" alt="Kegiatan 1">
    </div>
    <div class="slide">
      <img src="img/default.jpg" alt="Kegiatan 2">
    </div>
    <div class="slide">
      <img src="img/default.jpg" alt="Kegiatan 3">
    </div>

    <button class="slider-btn prev" onclick="prevSlide()">&#10094;</button>
    <button class="slider-btn next" onclick="nextSlide()">&#10095;</button>
  </div>
</section>
</body>
</html>
