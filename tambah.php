<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // Pastikan folder images ada dan bisa ditulisi
    if (!is_dir('images')) {
        mkdir('images', 0777, true);
    }

    move_uploaded_file($tmp, "images/" . $gambar);

    $query = "INSERT INTO produk (nama, harga, deskripsi, gambar, stok, kategori) 
              VALUES ('$nama', '$harga', '$deskripsi', '$gambar', '$stok', '$kategori')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location='admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; }
        h2 { text-align: center; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, textarea, select { padding: 8px; margin-top: 5px; }
        button { margin-top: 20px; padding: 10px; background-color: black; color: white; border: none; }
    </style>
</head>
<body>
    <h2>Tambah Produk (Upload Gambar)</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama Produk</label>
        <input type="text" name="nama" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="3" required></textarea>

        <label>Upload Gambar</label>
        <input type="file" name="gambar" accept="image/*" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="sunglasses">Sunglasses</option>
            <option value="eyeglasses">Eyeglasses</option>
            <option value="sport">Sport</option>
        </select>

        <button type="submit" name="submit">Simpan Produk</button>
    </form>
</body>
</html>
