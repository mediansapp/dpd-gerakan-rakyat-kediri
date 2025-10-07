<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold" href="index.php">Admin DPD Gerakan Rakyat</a>
    <div>
      <a href="index.php" class="nav-link d-inline text-dark">Dashboard</a>
      <a href="berita.php" class="nav-link d-inline text-dark">Berita</a>
      <a href="pengurus.php" class="nav-link d-inline text-dark">Pengurus</a>
      <a href="galeri.php" class="nav-link d-inline text-dark">Galeri</a>
      <a href="anggota.php" class="nav-link d-inline text-dark">Anggota</a>
      <a href="logout.php" class="nav-link d-inline text-danger">Logout</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
