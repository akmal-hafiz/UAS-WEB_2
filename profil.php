<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Profil Saya</h4>
        </div>
        <div class="card-body">
          <p><strong>Nama:</strong> <?= htmlspecialchars($_SESSION['nama']) ?></p>
          <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? 'Tidak tersedia') ?></p>
          <p><strong>Role:</strong> <?= ucfirst($_SESSION['role']) ?></p>

          <hr>
          <a href="riwayat.php" class="btn btn-outline-primary mb-2 w-100">Riwayat Pembelian</a>
          <a href="ubah_password.php" class="btn btn-outline-warning mb-2 w-100">Ubah Password</a>
          <a href="logout.php" class="btn btn-danger w-100">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

