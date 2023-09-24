const checkoutButton = document.getElementById('check-out');

checkoutButton.addEventListener('click', async () => {
    // Retrieve cart data from session storage
    const storedCart = sessionStorage.getItem('cart');
    if (storedCart) {
        const cart = JSON.parse(storedCart);

        // Prepare the data to send to the Laravel API
        const dataToSend = {
            cart: cart,
        };

        try {
            // Send a POST request to your Laravel API endpoint
            const response = await fetch('/api/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dataToSend),
            });

            if (response.ok) {
                // Cart data was successfully submitted
                console.log('Cart submitted successfully.');
                // Optionally, you can clear the cart and session storage here
                clearCartItems();
            } else {
                console.error('Failed to submit cart data.');
            }
        } catch (error) {
            console.error('Error while submitting cart data:', error);
        }
    }
});



// Wizard
$('#customer_details').show();
$('#order_review').hide();
var customer_details = document.querySelector(".bar_payment");
var order_review = document.querySelector(".bar_order");


$('.next-stage').on('click', async () => {
    $('#customer_details').hide();
    $('#order_review').show();
    // Add the "active" class to its classList
    order_review.classList.add("active");
});
$('.prev-stage').on('click', async () => {
    $('#customer_details').show();
    $('#order_review').hide();
    // Add the "active" class to its classList
    order_review.classList.remove("active");
});