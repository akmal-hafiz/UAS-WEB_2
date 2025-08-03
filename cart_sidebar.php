<!-- cart_sidebar.php -->
<style>
  .cart-sidebar {
    position: fixed;
    top: 0;
    right: -100%;
    width: 350px;
    height: 100%;
    background: #fff;
    box-shadow: -2px 0 10px rgba(0,0,0,0.1);
    z-index: 1000;
    padding: 20px;
    transition: right 0.3s ease-in-out;
    overflow-y: auto;
  }

  .cart-sidebar.active {
    right: 0;
  }

  .cart-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.4);
    z-index: 999;
    display: none;
  }

  .cart-overlay.active {
    display: block;
  }

  .cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .cart-header h2 {
    font-size: 22px;
    margin: 0;
  }

  .close-cart {
    font-size: 24px;
    cursor: pointer;
  }

  .cart-body {
    margin-top: 20px;
  }

  .cart-item {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
  }

  .cart-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
  }

  .cart-item h4 {
    font-size: 16px;
    margin: 0;
  }

  .cart-total {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    font-weight: bold;
    font-size: 16px;
  }

  .cart-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .cart-actions button {
    flex: 1;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
    font-weight: bold;
  }

  .cart-actions button:hover {
    background: #333;
  }

  .cart-note {
    font-size: 12px;
    color: #777;
    margin-top: 10px;
  }

  .cart-notif {
    font-size: 14px;
    color: green;
    display: none;
    margin-top: 10px;
  }

  .cart-notif.show {
    display: block;
  }

  .empty-cart {
    text-align: center;
    color: #888;
  }
</style>

<div id="cartSidebar" class="cart-sidebar">
  <div class="cart-header">
    <h2>Bag (<span id="cartCount">0</span>)</h2>
    <span class="close-cart" onclick="closeCart()">&times;</span>
  </div>

  <div class="cart-notif" id="cartNotif">Product added to your bag</div>

  <div class="cart-body" id="cartItems">
    <p class="empty-cart">Keranjang masih kosong.</p>
  </div>

  <div class="cart-footer">
    <div class="cart-total">
      <span>Total <small>excl tax</small></span>
      <span id="cartTotal">Rp 0</span>
    </div>
    <div class="cart-actions">
      <button class="go-bag" onclick="window.location.href='checkout.php'">GO TO BAG</button>
      <button class="continue" onclick="closeCart()">CONTINUE SHOPPING</button>
    </div>
    <p class="cart-note">Or, pay over time in interest-free installments with: <strong>Apple Pay</strong>, <strong>Affirm</strong>, <strong>Klarna</strong> or <strong>Paypal</strong>.</p>
  </div>
</div>

<div id="cartOverlay" class="cart-overlay" onclick="closeCart()"></div>
