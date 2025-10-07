<?php include('header.php'); include('../config/database.php'); ?>

<h3 class="mb-4">Manajemen Berita</h3>

<!-- Form tambah berita -->
<div class="card mb-4">
  <div class="card-header bg-warning text-dark">Tambah Berita</div>
  <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label>Gambar</label>
          <input type="file" name="gambar" class="form-control">
        </div>
      </div>
      <div class="mt-3">
        <label>Isi Berita</label>
        <textarea name="isi" class="form-control" rows="5"></textarea>
      </div>
      <button type="submit" name="simpan" class="btn btn-dark mt-3">Simpan</button>
    </form>
  </div>
</div>

<?php
if (isset($_POST['simpan'])) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tgl = date('Y-m-d');
  $gambar = '';

  if ($_FILES['gambar']['name']) {
    $gambar = 'berita_' . time() . '_' . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../uploads/$gambar");
  }

  mysqli_query($koneksi, "INSERT INTO berita (judul, isi, tanggal, gambar) VALUES ('$judul','$isi','$tgl','$gambar')");
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!-- Tabel data berita -->
<table class="table table-bordered">
  <thead class="table-warning text-dark">
    <tr>
      <th>No</th><th>Judul</th><th>Tanggal</th><th>Gambar</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
    while ($d = mysqli_fetch_array($q)) {
      echo "<tr>
        <td>$no</td>
        <td>$d[judul]</td>
        <td>$d[tanggal]</td>
        <td><img src='../uploads/$d[gambar]' width='80'></td>
        <td><a href='?hapus=$d[id]' class='btn btn-sm btn-danger'>Hapus</a></td>
      </tr>";
      $no++;
    }

    if (isset($_GET['hapus'])) {
      $id = $_GET['hapus'];
      mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");
      echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>
  </tbody>
</table>

<?php include('footer.php'); ?>
