<?php
session_start();
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = 'sport' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sport - FLACKO AND GLASSES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css"> 
  <style>
    .product-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
      text-align: center;
      transition: transform 0.3s ease;
    }
    .product-card:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }
    .product-card img {
      max-height: 200px;
      object-fit: cover;
      border-radius: 6px;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-5">Kategori: Sport</h2>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
      <div class="col-md-4">
        <div class="product-card">
          <img src="images/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>" class="product-img w-100">
          <div class="card-body">
            <h5><?= htmlspecialchars($row['nama']) ?></h5>
            <p class="text-danger">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
            <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-outline-dark btn-sm">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include 'cart_sidebar.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


