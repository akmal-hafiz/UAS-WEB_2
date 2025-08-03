<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kacamata Premium - Oakley Style</title>
  
  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Futura:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php include 'navbar.php'; ?>

  <!-- Hero Slider -->
  <div class="hero-slider">
    <!-- Slide 1 -->
    <div class="slide active">
      <img src="images/oakley0.avif" alt="Hero 1">
      <div class="hero-content">
        <h1 data-aos="fade-up">New Arivals 2025</h1>
        <p data-aos="fade-up" data-aos-delay="200">Temukan gaya yang mencerminkan kepribadianmu.</p>
        <a href="#" class="btn" data-aos="fade-up" data-aos-delay="400">BELI SEKARANG</a>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="slide">
      <img src="images/oakley for sports.avif" alt="Hero 2">
      <div class="hero-content">
        <h1 data-aos="fade-up">Oakley For Sports</h1>
        <p data-aos="fade-up" data-aos-delay="200">Desain ringan untuk performa maksimal.</p>
        <a href="#" class="btn" data-aos="fade-up" data-aos-delay="400">LIHAT KOLEKSI</a>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="slide">
      <img src="images/raybanhero.jpg" alt="Hero 3">
      <div class="hero-content">
        <h1 data-aos="fade-up">Ray Ban For Ferrari</h1>
        <p data-aos="fade-up" data-aos-delay="200">Wanna get women?</p>
        <a href="#" class="btn" data-aos="fade-up" data-aos-delay="400">PERSONALISASI</a>
      </div>
    </div>
    <button class="prev" onclick="prevSlide()">&#10094;</button>
    <button class="next" onclick="nextSlide()">&#10095;</button>
  </div>

  <!-- Featured Categories -->
  <section class="categories" data-aos="fade-up">
    <h2>KATEGORI POPULER</h2>
    <div class="filter-dropdown">
      <select id="categoryFilter" onchange="filterProducts()">
        <option value="all">Semua Kategori</option>
        <option value="sunglasses">Sunglasses</option>
        <option value="eyeglasses">Eyeglasses</option>
        <option value="sport">Sport</option>
      </select>
    </div>
    <div class="category-grid">
      <div class="category-item" data-category="sunglasses">
        <img src="images/holbrook.png" alt="Sunglasses">
        <h3>SUNGLASSES</h3>
      </div>
      <div class="category-item" data-category="eyeglasses">
        <img src="images/megaclubmaster.avif" alt="Eyeglasses">
        <h3>EYEGLASSES</h3>
      </div>
      <div class="category-item" data-category="sport">
        <img src="images/radarev.avif" alt="Sport Glasses">
        <h3>SPORT</h3>
      </div>
    </div>
  </section>


  
 <!-- Video Section ala RayBan -->
<section class="video-promo" data-aos="fade-up">
  <video autoplay muted loop playsinline class="promo-video">
    <source src="videos\raybenxmeta.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <div class="video-overlay">
    <h2>See The World Differently</h2>
    <a href="#" class="btn">Lihat Koleksi</a>
  </div>
</section>


  <!-- New Arrivals -->
  <section class="new-arrivals" data-aos="fade-up">
    <h2>NEW ARRIVALS</h2>
    <div class="product-grid">
      <?php
      include 'koneksi.php';
      $query = mysqli_query($conn, "SELECT * FROM produk");
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <div class="product-card" data-aos="zoom-in">
          <img src="images/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>">
          <div class="product-overlay">
            <h3><?= $row['nama'] ?></h3>
            <p>Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
            <button class="btn btn-add" onclick="addToCart(<?= $row['id'] ?>, '<?= addslashes($row['nama']) ?>', <?= $row['harga'] ?>, '<?= $row['gambar'] ?>')">Add to Cart</button>
          </div>
        </div>
      <?php 
        }
      } else {
        echo "<p>Tidak ada produk ditemukan.</p>";
      }
      ?>
    </div>
  </section>



<!-- Smooth Shopping Experience ala Ray-Ban -->
<section class="service-section" data-aos="fade-up">
  <h2>ENJOY A SMOOTH SHOPPING EXPERIENCE</h2>
  <p>Discover our online and in-store services.</p>
  <div class="service-cards">
    <div class="service-card">
      <img src="icons/store.png" alt="Pick Up in Store">
      <h3>BUY ONLINE,<br>PICK UP IN STORE</h3>
      <p>Buy online and pick up your item from any Ray-Ban, Sunglass Hut or partner store. Free fitting & adjustment in 900+ stores.</p>
      <a href="#">DISCOVER MORE</a>
    </div>
    <div class="service-card">
      <img src="icons/delivery.png" alt="Same Day Delivery">
      <h3>SAME-DAY DELIVERY AT HOME</h3>
      <p>Get it faster with our Premium same-day home delivery service.</p>
      <a href="#">DISCOVER MORE</a>
    </div>
    <div class="service-card">
      <img src="icons/return.png" alt="Return">
      <h3>NOT SURE?<br>RETURN FOR FREE</h3>
      <p>Not in love with your choice? Returning your order is free and easy.</p>
      <a href="#">DISCOVER MORE</a>
    </div>
    <div class="service-card">
      <img src="icons/eco_shipping.png" alt="Responsible Shipping">
      <h3>RESPONSIBLE SHIPPING</h3>
      <p>We ship using logistics partners with solutions to reduce emissions.</p>
      <a href="#">DISCOVER MORE</a>
    </div>
  </div>
</section>



  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h4>TENTANG KAMI</h4>
        <p>Brand kacamata premium dengan kualitas terbaik.</p>
      </div>
      <div class="footer-section">
        <h4>LINKS</h4>
        <ul>
          <li><a href="#">Beranda</a></li>
          <li><a href="#">Produk</a></li>
          <li><a href="#">Kontak</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h4>IKUTI KAMI</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>&copy; 2024 KacamataPremium. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="script.js" defer></script>

  <!-- Sidebar Keranjang -->
  <?php include 'cart_sidebar.php'; ?>

</body>
</html>
