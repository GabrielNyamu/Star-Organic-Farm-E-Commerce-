
const addToCartButtons = document.querySelectorAll('.product button');
const cartItemsContainer = document.getElementById('cart-items');
const totalPriceElement = document.getElementById('total-price');
const checkoutButton = document.getElementById('checkout-button');

let cart = [];


addToCartButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        const productElement = event.target.closest('.product');
        const productName = productElement.querySelector('strong').textContent;
        const selectElement = productElement.querySelector('select');
        const selectedOption = selectElement.options[selectElement.selectedIndex].text;
        const productPrice = parseFloat(selectedOption.split('- ksh')[1].trim());

        
        const product = { name: productName, price: productPrice, quantity: 1 };

       
        const existingProductIndex = cart.findIndex(item => item.name === productName && item.price === productPrice);
        
        if (existingProductIndex !== -1) {
            cart[existingProductIndex].quantity += 1;
        } else {
            cart.push(product);
        }

        updateCartDisplay();
    });
});


function updateCartDisplay() {
    cartItemsContainer.innerHTML = '';
    let totalPrice = 0;

    cart.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <p>${item.name} - ksh${item.price.toFixed(2)} x ${item.quantity}</p>
            <button onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItemsContainer.appendChild(cartItem);
        totalPrice += item.price * item.quantity;
    });

    totalPriceElement.textContent = totalPrice.toFixed(2);
}


function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}


checkoutButton.addEventListener('click', () => {
    if (cart.length === 0) {
        alert("Your cart is empty! Add some items first.");
        return;
    }

    const totalAmount = totalPriceElement.textContent;
    const cartDetails = cart.map(item => `${item.name} x${item.quantity} - ksh${item.price * item.quantity}`).join("\n");

    alert(`Thank you for shopping with us! Your total is: ksh${totalAmount}\n\nItems:\n${cartDetails}`);
    
    
});

checkoutButton.addEventListener('click', () => {
    if (cart.length === 0) {
        alert("Your cart is empty! Add some items first.");
        return;
    }

    
    const cartData = encodeURIComponent(JSON.stringify(cart));
    window.location.href = `checkout.html?cart=${cartData}`;
});


const urlParams = new URLSearchParams(window.location.search);
const cartData = JSON.parse(decodeURIComponent(urlParams.get('cart')));

console.log(cartData); 
