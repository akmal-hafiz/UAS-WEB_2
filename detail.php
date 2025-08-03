<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
  echo "Produk tidak ditemukan.";
  exit;
}

$id = (int) $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($query);

if (!$produk) {
  echo "Produk tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Produk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .product-img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }
    .badge-kategori {
      background-color: #343a40;
      color: #fff;
      font-size: 0.8rem;
      padding: 5px 10px;
      border-radius: 20px;
    }
    .btn-action {
      min-width: 160px;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <img src="images/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>" class="product-img shadow">
      </div>
      <div class="col-md-6">
        <h2 class="mb-3"><?= htmlspecialchars($produk['nama']) ?></h2>
        <p class="badge-kategori mb-3"><?= ucfirst($produk['kategori']) ?></p>
        <h4 class="text-danger">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h4>
        <p class="mt-3"><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>
        <p><strong>Stok tersedia:</strong> <?= $produk['stok'] ?></p>

        <div class="d-flex gap-2 mt-4">
  <button onclick="addToCart(<?= $produk['id'] ?>, '<?= addslashes($produk['nama']) ?>', <?= $produk['harga'] ?>, '<?= $produk['gambar'] ?>')" class="btn btn-dark">
    <i class="fas fa-shopping-cart me-1"></i> Add to Cart
  </button>

  <button class="btn btn-danger" disabled>
    <i class="fas fa-credit-card me-1"></i> Beli Sekarang
  </button>
</div>

        

        <a href="javascript:history.back()" class="btn btn-outline-secondary mt-4">
          <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
      </div>
    </div>
  </div>

<?php include 'cart_sidebar.php'; ?>
<script src="script.js"></script>

</body>
</html>
