<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
    }
    .sidebar {
      width: 250px;
      background: #212529;
      color: #fff;
      flex-shrink: 0;
      padding-top: 20px;
    }
    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      padding: 10px 20px;
      display: block;
      transition: 0.2s;
    }
    .sidebar a:hover {
      background: #343a40;
      color: #fff;
    }
    .content {
      flex-grow: 1;
      padding: 30px;
    }
    .table img {
      max-width: 60px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <a href="admin.php"><i class="fas fa-box"></i> Produk</a>
    <a href="admin_user.php"><i class="fas fa-users"></i> User</a>
    <a href="index.php"><i class="fas fa-home"></i> Kembali ke Homepage</a>
  </div>

  <div class="content">
    <h2>Daftar Produk</h2>

    <!-- Filter Kategori -->
    <form method="GET" class="mb-3">
      <div class="row">
        <div class="col-md-4">
          <select name="kategori" class="form-select">
            <option value="">-- Semua Kategori --</option>
            <option value="sunglasses" <?= isset($_GET['kategori']) && $_GET['kategori'] == 'sunglasses' ? 'selected' : '' ?>>Sunglasses</option>
            <option value="eyeglasses" <?= isset($_GET['kategori']) && $_GET['kategori'] == 'eyeglasses' ? 'selected' : '' ?>>Eyeglasses</option>
            <option value="sport" <?= isset($_GET['kategori']) && $_GET['kategori'] == 'sport' ? 'selected' : '' ?>>Sport</option>
          </select>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-dark">Filter</button>
        </div>
      </div>
    </form>

    <a href="tambah.php" class="btn btn-dark mb-3"><i class="fas fa-plus"></i> Tambah Produk</a>

    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Kategori</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
        if ($kategori) {
          $query = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '$kategori' ORDER BY id DESC");
        } else {
          $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
        }
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
          <td><?= $row['stok'] ?></td>
          <td><?= ucfirst($row['kategori']) ?></td>
          <td><img src="images/<?= $row['gambar'] ?>" alt="Gambar"></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>
</html>
