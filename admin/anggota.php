<?php include('header.php'); include('../config/database.php'); ?>

<h3 class="mb-4">Data Pendaftar Anggota</h3>

<table class="table table-bordered">
  <thead class="table-warning text-dark">
    <tr>
      <th>No</th><th>Nama</th><th>Alamat</th><th>No HP</th><th>Email</th><th>Tanggal Daftar</th><th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
    while ($d = mysqli_fetch_array($q)) {
      echo "<tr>
        <td>$no</td>
        <td>$d[nama]</td>
        <td>$d[alamat]</td>
        <td>$d[no_hp]</td>
        <td>$d[email]</td>
        <td>$d[tanggal_daftar]</td>
        <td><a href='?hapus=$d[id]' class='btn btn-sm btn-danger'>Hapus</a></td>
      </tr>";
      $no++;
    }

    if (isset($_GET['hapus'])) {
      mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$_GET[hapus]'");
      echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>
  </tbody>
</table>

<?php include('footer.php'); ?>
