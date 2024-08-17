@extends('layouts.saleslayout')

@section('mainpage')
<div class="popup-container" id="popupContainer">
    <div class="popup-content" style="padding:0;">
        <span class="close-btn" id="closePopup">&times;</span>
        <div class="heading">All Items</div>
        <div style="padding:10px;">
            <div class="cartItem" style="background-color:#F4F4F4;padding:0px 10px;display: grid;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
                <p>Image</p>
                <p>Name</p>
                <p>Price</p>
                <p>Quantity</p>
                <p>Total Price</p>
            </div>
            <div id="orderProductsList"></div>
        </div>
    </div>
</div>

<div style="display:flex;flex-direction:row;">
    <div class="container">
        <div class="heading">{{ __('Profile') }}</div>
        <form method="POST" action="/profile" enctype="multipart/form-data" class="profileform">
            {{ csrf_field() }}
            @method('PATCH')
            <div>
                <label for="customerName">{{ __('Name') }}</label>
                <div>
                    <input id="customerName" name="customerName" value="{{ Auth::user()->name }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="alignitem">
                <label for="customerEmail">{{ __('Email Address') }}</label>
                <div>
                    <input id="customerEmail" type="email" name="customerEmail" value="{{ Auth::user()->email }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="alignitem">
                <label for="customerAddress">{{ __('Address') }}</label>
                <div>
                    <input id="customerAddress" type="text" name="customerAddress" value="{{ Auth::user()->address }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <input type="submit" value="Update" style="margin-top:0;">
        </form>
        <div class="logbutton">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <div class="container">
        <div class="heading">All Orders</div>
        <div style="padding:10px;">
            <div class="orderline" style="background-color:#F4F4F4">
                <div>
                    Status
                </div>
                <div>
                    Total Price
                </div>
                <div>
                    <span style="margin-left:33px;">Item</span>
                </div>
                <div>
                    <span style="margin-left:23px;">Receipt</span>
                </div>
            </div>
            @foreach($orders as $order)
            <div class="orderline">
                <div>{{ $order->orderStatus }}</div>
                <div>RM{{ number_format($order->total_price, 2) }}</div>
                <button class="generatebutton cart-icon" style="position:relative;" onclick="showOrderProducts({{ $order->orderID }})">
                    View
                </button>
                <button class="generatebutton">
                    <a href="{{ url('/profile/' . $order->orderID . '/receipt') }}" style="text-decoration: none; color: inherit;">
                        Generate
                    </a>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function showOrderProducts(orderID) {
        const order = @json($orders).find(o => o.orderID === orderID);


        const productsContainer = document.getElementById('orderProductsList');

        productsContainer.innerHTML = '';

        order.products.forEach(product => {
            const productHTML = `
                <div class="cartItem" style="grid-template-columns: 1fr 1fr 1fr 1fr 1fr;">
                    <img src="/storage/coffeList/${product.productImage}" alt="${product.productName}" style="width: 50px; height: 50px;">
                    <p>${product.productName}</p>
                    <p>RM${parseFloat(product.productPrice).toFixed(2)}</p>
                    <p>${product.pivot.quantity}</p>
                    <p>RM${(product.productPrice * product.pivot.quantity).toFixed(2)}</p>
                </div>
            `;
            productsContainer.insertAdjacentHTML('beforeend', productHTML);
        });


        document.getElementById('popupContainer').style.display = 'block';
    }

    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('popupContainer').style.display = 'none';
    });
</script>
@endsection
