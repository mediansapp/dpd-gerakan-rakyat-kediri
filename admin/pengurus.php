<?php include('header.php'); include('../config/database.php'); ?>

<h3 class="mb-4">Struktur Kepengurusan</h3>

<div class="card mb-4">
  <div class="card-header bg-warning text-dark">Tambah Pengurus</div>
  <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" required>
        </div>
      </div>
      <div class="mt-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
      </div>
      <button type="submit" name="simpan" class="btn btn-dark mt-3">Simpan</button>
    </form>
  </div>
</div>

<?php
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $foto = '';

  if ($_FILES['foto']['name']) {
    $foto = 'pengurus_' . time() . '_' . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/$foto");
  }

  mysqli_query($koneksi, "INSERT INTO pengurus (nama, jabatan, foto) VALUES ('$nama','$jabatan','$foto')");
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<table class="table table-bordered">
  <thead class="table-warning text-dark">
    <tr>
      <th>No</th><th>Nama</th><th>Jabatan</th><th>Foto</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM pengurus ORDER BY id DESC");
    while ($d = mysqli_fetch_array($q)) {
      echo "<tr>
        <td>$no</td>
        <td>$d[nama]</td>
        <td>$d[jabatan]</td>
        <td><img src='../uploads/$d[foto]' width='80'></td>
        <td><a href='?hapus=$d[id]' class='btn btn-sm btn-danger'>Hapus</a></td>
      </tr>";
      $no++;
    }

    if (isset($_GET['hapus'])) {
      mysqli_query($koneksi, "DELETE FROM pengurus WHERE id='$_GET[hapus]'");
      echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>
  </tbody>
</table>

<?php include('footer.php'); ?>
