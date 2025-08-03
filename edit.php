<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Produk tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload gambar baru jika ada
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "images/" . $gambar);
    } else {
        $gambar = $data['gambar']; // gunakan gambar lama jika tidak upload baru
    }

    $update = mysqli_query($conn, "UPDATE produk SET 
        nama = '$nama',
        harga = '$harga',
        deskripsi = '$deskripsi',
        gambar = '$gambar',
        stok = '$stok',
        kategori = '$kategori'
        WHERE id = $id");

    if ($update) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location='admin.php';</script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      padding: 40px;
      font-family: 'Arial', sans-serif;
    }
    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Edit Produk</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="3" required><?= $data['deskripsi'] ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar Saat Ini</label><br>
      <img src="images/<?= $data['gambar'] ?>" width="100"><br><br>
      <input type="file" name="gambar" class="form-control">
      <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
    </div>

    <div class="mb-3">
      <label class="form-label">Stok</label>
      <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Kategori</label>
      <select name="kategori" class="form-select" required>
        <option value="sunglasses" <?= $data['kategori'] == 'sunglasses' ? 'selected' : '' ?>>Sunglasses</option>
        <option value="eyeglasses" <?= $data['kategori'] == 'eyeglasses' ? 'selected' : '' ?>>Eyeglasses</option>
        <option value="sport" <?= $data['kategori'] == 'sport' ? 'selected' : '' ?>>Sport</option>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary w-100">Update Produk</button>
  </form>
</div>

</body>
</html>
