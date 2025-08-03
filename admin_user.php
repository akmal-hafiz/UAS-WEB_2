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
  <title>Data User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
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
  <h2>Daftar Pengguna Baru</h2>
  <table class="table table-bordered table-striped mt-4">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Terdaftar Pada</th>
      </tr>
    </thead>
    <tbody>
<?php
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
while ($user = mysqli_fetch_assoc($query)) {
?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($user['nama']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td><?= $user['role'] ?></td>
    <td><?= date('d M Y H:i', strtotime($user['created_at'])) ?></td>
  </tr>
<?php } ?>
</tbody>

  </table>
</div>

</body>
</html>
