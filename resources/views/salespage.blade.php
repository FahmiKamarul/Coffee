@extends('layouts.saleslayout')

@section('mainpage')
<span style="background-color:grey;display: flex; font-size: 30px; width: 100%; justify-content: center; align-items: center; text-align: center;">
    Select Item to Buy
</span>
<div class="selection">
    @foreach($products as $product)
    <button class="add-to-cart" 
            data-id="{{ $product->productID }}"
            data-name="{{ $product->productName }}" 
            data-price="{{ $product->productPrice }}"
            data-image="{{ asset('storage/coffeList/' . $product->productImage) }}"
            data-description="{{ $product->productDescription }}"
            data-category="{{ $product->productCategory }}"
            data-dairy-free="{{ $product->productDairyFree ? 'Yes' : 'No' }}"
            data-quantity="1"> <!-- Default quantity -->
        <img src="{{ asset('storage/coffeList/' . $product->productImage) }}" alt="">
    </button>
    @endforeach
</div>

<button class="cart-icon">
    <img src="/img/1413908-removebg-preview.png" alt="">
</button>

<div class="popup-container" id="popupContainer">
    <div class="popup-content">
        <span class="close-btn" id="closePopup">&times;</span>
        <div class="heading">All Items</div>
        <form method="POST" action="/order" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="cartData" name="cartData">
            <div id="cartItems"></div>
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Store cart items
    const cart = {};

    // Function to add or update a product in the cart
    function addProductToCart(productID, name, price, image, description, category, dairyFree, quantity) {
        if (!cart[productID]) {
            cart[productID] = {
                productID: productID,
                name: name,
                price: price,
                image: image,
                description: description,
                category: category,
                dairyFree: dairyFree,
                quantity: 0
            };
        }
        
        cart[productID].quantity += parseInt(quantity);

        updateCartDisplay();
    }

    // Function to serialize the cart data into a JSON string
    function serializeCartData() {
        return JSON.stringify(Object.values(cart).map(item => ({
            productID: item.productID,
            quantity: item.quantity
        })));
    }

    // Function to update cart display and hidden input field
    function updateCartDisplay() {
        const cartItems = document.getElementById('cartItems');
        cartItems.innerHTML = '';

        Object.values(cart).forEach(item => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');

            productItem.innerHTML = `
                <div class="cartItem">
                    <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px;">
                    <p>Name: ${item.name}</p>
                    <p>Price: $${item.price}</p>
                    <div class="quantity">Quantity: 
                        <div >
                            <button type="button" class="btn decrease-quantity">-</button>
                            ${item.quantity}
                            <button type="button" class="btn increase-quantity">+</button>
                        </div>
                    </div>
                    <p>Total: $${(item.price * item.quantity).toFixed(2)}</p>
                    <button type="button" class="remove-product">Remove</button>
                </div>
            `;

            cartItems.appendChild(productItem);

            // Increase quantity
            productItem.querySelector('.increase-quantity').addEventListener('click', function() {
                cart[item.productID].quantity += 1;
                updateCartDisplay();
            });

            // Decrease quantity
            productItem.querySelector('.decrease-quantity').addEventListener('click', function() {
                cart[item.productID].quantity -= 1;
                if (cart[item.productID].quantity <= 0) {
                    delete cart[item.productID];
                }
                updateCartDisplay();
            });

            // Remove product
            productItem.querySelector('.remove-product').addEventListener('click', function() {
                delete cart[item.productID];
                updateCartDisplay();
            });
        });

        // Update hidden input with serialized cart data
        document.getElementById('cartData').value = serializeCartData();
    }

    // Event listener to open the popup
    document.querySelector('.cart-icon').addEventListener('click', function() {
        document.getElementById('popupContainer').style.display = 'block';
    });

    // Event listener to close the popup
    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('popupContainer').style.display = 'none';
    });

    // Event listeners to add products to the cart when a product is clicked
    document.querySelectorAll('.add-to-cart').forEach(function(button) {
        button.addEventListener('click', function() {
            const productID = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            const image = this.getAttribute('data-image');
            const description = this.getAttribute('data-description');
            const category = this.getAttribute('data-category');
            const dairyFree = this.getAttribute('data-dairy-free');
            const quantity = this.getAttribute('data-quantity');
            addProductToCart(productID, name, price, image, description, category, dairyFree, quantity);
        });
    });
</script>
@endsection
