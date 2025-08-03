// Mobile Menu Toggle
function toggleMenu() {
  const navLinks = document.getElementById('navLinks');
  navLinks.classList.toggle('active');
}

// Hero Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(n) {
  slides.forEach(slide => slide.classList.remove('active'));
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
}
function nextSlide() { showSlide(currentSlide + 1); }
function prevSlide() { showSlide(currentSlide - 1); }
setInterval(nextSlide, 5000);

// Filter Produk
function filterProducts() {
  const filter = document.getElementById('categoryFilter').value;
  const items = document.querySelectorAll('.category-item');
  items.forEach(item => {
    item.style.display = (filter === 'all' || item.dataset.category === filter) ? 'block' : 'none';
  });
}

// AOS
document.addEventListener('DOMContentLoaded', () => {
  AOS.init({ duration: 1000, once: true });
});

// Dark Mode Toggle
const darkModeToggle = document.createElement('button');
darkModeToggle.className = 'dark-mode-toggle';
darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
document.body.appendChild(darkModeToggle);
darkModeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  const icon = darkModeToggle.querySelector('i');
  if (document.body.classList.contains('dark-mode')) {
    icon.classList.replace('fa-moon', 'fa-sun');
    localStorage.setItem('darkMode', 'enabled');
  } else {
    icon.classList.replace('fa-sun', 'fa-moon');
    localStorage.setItem('darkMode', 'disabled');
  }
});
if (localStorage.getItem('darkMode') === 'enabled') {
  document.body.classList.add('dark-mode');
  darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
}

// Cart Functions
function openCart() {
  document.getElementById("cartSidebar").classList.add("active");
  document.getElementById("cartOverlay").classList.add("active");
}
function closeCart() {
  document.getElementById("cartSidebar").classList.remove("active");
  document.getElementById("cartOverlay").classList.remove("active");
}
window.closeCart = closeCart;

window.addToCart = function (id, name, price, img) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let existing = cart.find(item => item.id === id);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ id, name, price, img, qty: 1 });
  }
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCartItems();
  openCart();
}

function updateQty(id, amount) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.map(item => {
    if (item.id === id) {
      item.qty += amount;
      if (item.qty < 1) item.qty = 1;
    }
    return item;
  });
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCartItems();
}

function removeFromCart(id) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.filter(item => item.id !== id);
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCartItems();
}

function renderCartItems() {
  const cartItems = document.getElementById("cartItems");
  const cartCount = document.getElementById("cartCount");
  const cartCountNav = document.getElementById("cartCountNav");
  const cartTotal = document.getElementById("cartTotal");
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  let total = 0;
  cartItems.innerHTML = '';

  if (cart.length === 0) {
    cartItems.innerHTML = `<p class="empty-cart">Keranjang masih kosong.</p>`;
  } else {
    cart.forEach(item => {
      total += item.price * item.qty;
      cartItems.innerHTML += `
        <div class="cart-item">
          <img src="images/${item.img}" alt="${item.name}">
          <div>
            <h4>${item.name}</h4>
            <div class="quantity-control">
              <button onclick="updateQty(${item.id}, -1)">-</button>
              <span>${item.qty}</span>
              <button onclick="updateQty(${item.id}, 1)">+</button>
              <button onclick="removeFromCart(${item.id})" class="btn-remove">×</button>
            </div>
            <p>Rp ${(item.price * item.qty).toLocaleString()}</p>
          </div>
        </div>
      `;
    });
  }

  if (cartCount) cartCount.innerText = cart.length;
  if (cartCountNav) cartCountNav.innerText = cart.length;
  if (cartTotal) cartTotal.innerText = `Rp ${total.toLocaleString()}`;
}

function renderCheckoutPage() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const checkoutItems = document.getElementById("checkoutItems");
  const checkoutTotal = document.getElementById("checkoutTotal");

  let total = 0;
  checkoutItems.innerHTML = '';

  if (cart.length === 0) {
    checkoutItems.innerHTML = '<p>Keranjang kosong. Silakan tambahkan produk terlebih dahulu.</p>';
  } else {
    cart.forEach((item) => {
      const div = document.createElement("div");
      div.className = "mb-3";
      div.innerHTML = `
        <strong>${item.name}</strong><br>
        Qty: ${item.qty} | Harga: Rp ${item.price.toLocaleString()}<hr>
      `;
      checkoutItems.appendChild(div);
      total += item.price * item.qty;
    });

    checkoutTotal.innerText = `Rp ${total.toLocaleString()}`;
  }
}

function submitOrder(event) {
  event.preventDefault();
  alert("✅ Pesanan berhasil dibuat! Terima kasih telah berbelanja.");
  localStorage.removeItem("cart");
  window.location.href = "index.php";
}

if (window.location.pathname.includes("checkout.php")) {
  document.addEventListener("DOMContentLoaded", renderCheckoutPage);
}

// Load cart on page load
document.addEventListener("DOMContentLoaded", renderCartItems);
