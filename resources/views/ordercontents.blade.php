@extends('orderManagement')

@section('ordercontent')

<div id="popupModal" class="modal">
    <div class="modal-content container">
        <a href="{{ url()->previous() }}"><span class="close">&times;</span></a>
        {{$ord->orderStatus}}
        
        @foreach ($ord->orderProducts as $orderProduct)
            @php
                $product = $orderProduct->product; 
            @endphp
            <div class="productorder">
                @if($product && $product->productImage)
                <img src="{{ asset('storage/coffeList/' . $product->productImage) }}" alt="">
                @endif
                Product ID: {{ $orderProduct->productID }}<br>
                Quantity: {{ $orderProduct->quantity }}
            </div>
        @endforeach
    </div>
</div>
@endsection