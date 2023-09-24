// Selectors
const cartSidebar = document.getElementById('cart-sidebar');
const closeCart = document.getElementById('close-cart');
const clearCart = document.getElementById('clear-cart');
const cartItems = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');

// Initialize cart from session storage (if it exists)
let cart = JSON.parse(sessionStorage.getItem('cart')) || {};

// Function to update the cart sidebar
function updateCartSidebar() {
    cartItems.innerHTML = '';
    let total = 0;

    for (const productId in cart) {
        if (cart.hasOwnProperty(productId)) {
            const product = cart[productId];
            const item = document.createElement('li');

            // Create buttons for increasing, decreasing, and removing items
            const increaseButton = document.createElement('button');
            increaseButton.textContent = '+';
            increaseButton.addEventListener('click', () => {
                cart[productId].qty++;
                cart[productId].subtotal += cart[productId].price;
                updateCartSidebar();
                storeCart();
            });

            const decreaseButton = document.createElement('button');
            decreaseButton.textContent = '-';
            decreaseButton.addEventListener('click', () => {
                if (cart[productId].qty > 1) {
                    cart[productId].qty--;
                    cart[productId].subtotal -= cart[productId].price;
                } else {
                    delete cart[productId];
                }
                updateCartSidebar();
                storeCart();
            });

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', () => {
                delete cart[productId];
                updateCartSidebar();
                storeCart();
            });

            item.innerHTML = `
                ${product.name} - $${product.subtotal.toFixed(2)} (Qty: ${product.qty})
            `;
            item.appendChild(increaseButton);
            item.appendChild(decreaseButton);
            item.appendChild(removeButton);

            cartItems.appendChild(item);
            total += product.subtotal;
        }
    }

    cartTotal.textContent = `Total: $${total.toFixed(2)}`;
}

// Function to store the cart in session storage
function storeCart() {
    sessionStorage.setItem('cart', JSON.stringify(cart));
}

// Function to add an item to the cart
function addToCart(product) {
    if (!cart[product.id]) {
        cart[product.id] = {
            name: product.name,
            price: product.price,
            qty: 1,
            subtotal: product.price,
        };
    } else {
        cart[product.id].qty++;
        cart[product.id].subtotal += product.price;
    }

    // Update the cart sidebar
    updateCartSidebar();

    // Show the cart sidebar
    cartSidebar.classList.add('show');

    // alert(isAuthenticated);
    if (isAuthenticated) {
        // User is authenticated, make an API request to addToCart
        $.ajax({
            url: 'api/add-cart', // Replace with the actual API endpoint
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: product.id,
                cart_qty: cart[product.id].qty,
                email: current_user.email,
                // Include additional data as needed
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Include CSRF token header
                // 'Authorization': 'Bearer ' + yourAuthToken, // Include your authentication token here
            },
            success: function(response) {
                // Handle the success response from the server
                console.log('Item added to cart:', response);
            },
            error: function(error) {
                // Handle any errors that occur during the request
                console.error('Error adding item to cart:', error);
            }
        });
    } else {
        // User is not authenticated, store the cart in session storage
        sessionStorage.setItem('cart', JSON.stringify(cart));
    }
}

// Function to remove an item from the cart
function removeFromCart(productId) {
    if (cart[productId]) {
        if (cart[productId].qty === 1) {
            delete cart[productId];
        } else {
            cart[productId].qty--;
            cart[productId].subtotal -= cart[productId].price;
        }

        // Update the cart sidebar
        updateCartSidebar();

        // Store the cart in session storage
        sessionStorage.setItem('cart', JSON.stringify(cart));
    }
}

// Function to clear the cart
function clearCartItems() {
    cartItems.innerHTML = '';
    cartTotal.textContent = 'Total: $0.00';
    cartSidebar.classList.remove('show');
    cart = {};

    // Clear session storage
    sessionStorage.removeItem('cart');
}

// Close cart sidebar
closeCart.addEventListener('click', function () {
    cartSidebar.classList.remove('show');
});

// Add to cart button click event
const addToCartButtons = document.querySelectorAll('.add_to_cart_button');
addToCartButtons.forEach((button) => {
    button.addEventListener('click', function () {
        const product = {
            id: button.getAttribute('data-product_id'),
            name: button.getAttribute('data-product-name'),
            price: parseFloat(button.getAttribute('data-product-price')),
        };
        addToCart(product);
    });
});

// Remove from cart button click event (you can customize this selector)
document.body.addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-from-cart')) {
        const productId = event.target.getAttribute('data-product-id');
        removeFromCart(productId);
    }
});

// Clear cart button click event
clearCart.addEventListener('click', function () {
    clearCartItems();
});

// Initialize cart on page load
updateCartSidebar();
