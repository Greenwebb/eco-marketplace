<style>
.cart-sidebar {
    position: fixed;
    top: 0;
    right: -300px; /* Hidden by default */
    width: 300px;
    height: 100%;
    background-color: #fff;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
    transition: right 0.3s ease-in-out;
    z-index: 9999;
    overflow-y: auto;
}

.cart-sidebar.show {
    right: 0;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
}

.cart-header h3 {
    margin: 0;
}

.cart-items {
    list-style: none;
    padding: 0;
}

.cart-items li {
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
}

.cart-items li:last-child {
    border-bottom: none;
}

.clear-cart {
    display: block;
    width: 100%;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}
.check-out {
    display: block;
    width: 100%;
    padding: 10px 20px;
    background-color: #126f52;
    color: #fff;
    border: none;
    cursor: pointer;
}

</style>
<div id="cart-sidebar" class="cart-sidebar">
    <div class="cart-header">
        <h3>Your Cart</h3>
        <button id="close-cart" class="close-cart">Close</button>
    </div>
    <ul id="cart-items" class="cart-items">
        <!-- Cart items will be dynamically added here -->
    </ul>
    <p>Total: $<span id="cart-total">0.00</span></p>
    <button id="clear-cart" class="clear-cart">Clear Cart</button>
    <a href="{{ route('checkout.index') }}" id="check-out" class="check-out">Checkout</a>
</div>
