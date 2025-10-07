<?php include('config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Berita - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">DPD Gerakan Rakyat Kota Kediri</a>
  </div>
</nav>

<div class="container my-5">
<?php
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $q = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
  $d = mysqli_fetch_array($q);
  echo "
  <h2 class='mb-3'>$d[judul]</h2>
  <img src='uploads/$d[gambar]' class='img-fluid mb-4'>
  <p>$d[isi]</p>
  <a href='berita.php' class='btn btn-warning text-dark'>Kembali</a>";
} else {
  echo "<h3 class='text-center mb-4'>Daftar Berita</h3><div class='row'>";
  $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
  while($d = mysqli_fetch_array($q)){
    echo "
    <div class='col-md-4 mb-4'>
      <div class='card'>
        <img src='uploads/$d[gambar]' class='card-img-top'>
        <div class='card-body'>
          <h5>$d[judul]</h5>
          <p>".substr($d['isi'],0,100)."...</p>
          <a href='berita.php?id=$d[id]' class='btn btn-warning btn-sm text-dark'>Baca</a>
        </div>
      </div>
    </div>";
  }
  echo "</div>";
}
?>
</div>

<footer class="bg-dark text-light text-center py-3">
  © 2025 DPD Gerakan Rakyat Kota Kediri
</footer>
</body>
</html>
