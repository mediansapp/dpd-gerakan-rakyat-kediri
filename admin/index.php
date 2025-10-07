<?php include('header.php'); ?>
<h3 class="mb-4">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h3>

<div class="row">
  <div class="col-md-3">
    <div class="card bg-warning text-dark text-center p-3">
      <h5>Berita</h5>
      <p class="fs-4">
        <?php
        include('../config/database.php');
        $berita = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita"));
        echo $berita;
        ?>
      </p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-warning text-dark text-center p-3">
      <h5>Pengurus</h5>
      <p class="fs-4"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengurus")); ?></p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-warning text-dark text-center p-3">
      <h5>Galeri</h5>
      <p class="fs-4"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM galeri")); ?></p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-warning text-dark text-center p-3">
      <h5>Anggota</h5>
      <p class="fs-4"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM anggota")); ?></p>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
