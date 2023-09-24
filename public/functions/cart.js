$(document).ready(function () {
    const cartItems = JSON.parse(sessionStorage.getItem('cart')) || [];
    const $cartItemsList = $('.cart-items');
    const $cartTotal = $('.cart-total');

    // Display the initial cart content
    updateCartUI();

    // Add product to the cart
    $('.add-to-cart').on('click', function () {
        const $product = $(this).closest('.product');
        const productId = $product.data('id');
        const productName = $product.data('name');
        const productPrice = parseFloat($product.data('price'));

        // Check if the product is already in the cart
        const existingCartItem = cartItems.find(item => item.id === productId);

        if (existingCartItem) {
            existingCartItem.quantity++;
        } else {
            cartItems.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: 1,
            });
        }

        // Update session storage and UI
        updateCartUI();
    });

    // Update the cart UI
    function updateCartUI() {
        // Clear the cart list
        $cartItemsList.empty();

        let total = 0;

        cartItems.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            const $cartItem = $(`<li>${item.name} (Quantity: ${item.quantity}) - $${itemTotal.toFixed(2)}</li>`);
            $cartItemsList.append($cartItem);
        });

        // Update the total
        $cartTotal.text(total.toFixed(2));

        // Update session storage
        sessionStorage.setItem('cart', JSON.stringify(cartItems));
    }


    function clearCart() {
        // Clear the cart items and update the UI
        cartItems.length = 0; // Clear the array
        updateCartUI();
    }
});
