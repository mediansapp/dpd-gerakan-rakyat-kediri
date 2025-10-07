<?php include('config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Anggota - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">DPD Gerakan Rakyat Kota Kediri</a>
  </div>
</nav>

<div class="container my-5">
  <h3 class="text-center mb-4">Formulir Pendaftaran Anggota</h3>

  <?php
  if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat, no_hp, email) VALUES ('$nama','$alamat','$no_hp','$email')");
    echo "<div class='alert alert-success'>Pendaftaran berhasil! Data Anda telah kami simpan.</div>";
  }
  ?>

  <form method="POST" class="mx-auto" style="max-width:500px;">
    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>No HP</label>
      <input type="text" name="no_hp" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <button type="submit" name="daftar" class="btn btn-warning text-dark w-100">Daftar Sekarang</button>
  </form>
</div>

<footer class="bg-dark text-light text-center py-3">
  © 2025 DPD Gerakan Rakyat Kota Kediri
</footer>
</body>
</html>
