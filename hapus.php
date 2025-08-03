<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapus = mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

    if ($hapus) {
        echo "<script>alert('Produk berhasil dihapus!'); window.location='admin.php';</script>";
    } else {
        echo "Gagal menghapus produk.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>

