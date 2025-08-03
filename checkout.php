<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="script.js" defer></script>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container py-5">
    <h2 class="mb-4">Checkout</h2>

    <div id="checkoutItems" class="mb-4"></div>

    <h4>Total: <span id="checkoutTotal" class="text-danger">Rp 0</span></h4>

    <form onsubmit="submitOrder(event)" class="mt-4">
      <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
    </form>
  </div>
</body>
</html>

