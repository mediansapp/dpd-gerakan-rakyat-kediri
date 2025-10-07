<?php
session_start();
include('../config/database.php');

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: index.php");
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - DPD Gerakan Rakyat Kota Kediri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-warning d-flex align-items-center" style="height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow">
          <div class="card-header bg-dark text-light text-center">
            <h5>Login Admin</h5>
          </div>
          <div class="card-body">
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="POST">
              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button type="submit" name="login" class="btn btn-dark w-100">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
