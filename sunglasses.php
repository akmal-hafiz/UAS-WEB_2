<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = 'sunglasses' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sunglasses</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .product-card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 30px;
      transition: 0.3s;
      height: 100%;
    }
    .product-card:hover {
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .product-img {
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .card-body {
      text-align: center;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-5">Kategori: Sunglasses</h2>
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


</body>
</html>
