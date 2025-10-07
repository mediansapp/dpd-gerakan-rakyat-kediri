<?php include('config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Struktur Kepengurusan - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">DPD Gerakan Rakyat Kota Kediri</a>
  </div>
</nav>

<div class="container my-5">
  <h3 class="text-center mb-4">Struktur Kepengurusan</h3>
  <div class="row">
    <?php
      $q = mysqli_query($koneksi, "SELECT * FROM pengurus ORDER BY id ASC");
      while($d = mysqli_fetch_array($q)){
        echo "
        <div class='col-md-3 text-center mb-4'>
          <img src='uploads/$d[foto]' class='rounded-circle mb-2' width='120' height='120'>
          <h6 class='fw-bold'>$d[nama]</h6>
          <p>$d[jabatan]</p>
        </div>";
      }
    ?>
  </div>
</div>

<footer class="bg-dark text-light text-center py-3">
  © 2025 DPD Gerakan Rakyat Kota Kediri
</footer>
</body>
</html>
