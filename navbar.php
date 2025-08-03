<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
  .cart-icon {
    position: relative;
    display: inline-block;
    margin-left: 20px;
    color: #000;
    text-decoration: none;
  }
  .cart-icon i {
    font-size: 20px;
  }
  .cart-icon span {
    position: absolute;
    top: -8px;
    right: -10px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">FLACKO<span class="text-danger">GLASSES</span></a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="sunglasses.php">Sunglasses</a></li>
        <li class="nav-item"><a class="nav-link" href="eyeglasses.php">Eyeglasses</a></li>
        <li class="nav-item"><a class="nav-link" href="sport.php">Sport</a></li>
        <li class="nav-item"><a class="nav-link" href="new.php">New Arrivals</a></li>
      </ul>

      <!-- Dropdown User -->
      <div class="dropdown">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i>
          <?php if (isset($_SESSION['nama'])): ?>
            <?= htmlspecialchars($_SESSION['nama']) ?>
          <?php else: ?>
            Akun
          <?php endif; ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
          <?php if (isset($_SESSION['login'])): ?>
            <li><a class="dropdown-item" href="profil.php"><i class="fas fa-user-circle me-2"></i>Profil Saya</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
          <?php else: ?>
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><a class="dropdown-item" href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Ikon Keranjang -->
      <a href="javascript:void(0)" onclick="openCart()" class="cart-icon ms-3">
        <i class="fas fa-shopping-bag"></i>
        <span id="cartCountNav">0</span>
      </a>
    </div>
  </div>
</nav>
