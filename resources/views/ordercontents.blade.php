@extends('orderManagement')

@section('ordercontent')

<div id="popupModal" class="modal">
    <div class="modal-content container" style="padding:0;width:600px;border-radius:8px;">
        <a href="{{ url()->previous() }}"><span class="close">&times;</span></a>
        <div class="heading">{{$ord->orderStatus}}</div>
        <div style="padding:5px;box-sizing:border-box;">
            <div class="productorder" style="background-color:#F4F4F4">
                <div></div>
                <div>ID</div>
                <div>Name</div>
                <div>Quantity</div>
                <div>TotalPrice</div>
            </div>
            @foreach ($ord->orderProducts as $orderProduct)
                @php
                    $product = $orderProduct->product; 
                @endphp
                <div class="productorder">
                    @if($product && $product->productImage)
                    <img src="{{ asset('storage/coffeList/' . $product->productImage) }}" alt="">
                    @endif
                    <div>{{$product->productID}}</div>
                    <div>
                    {{ $product->productName }}
                    </div>
                    <div>
                    {{ $orderProduct->quantity }}
                    </div>
                    <div>RM{{number_format( $product->productPrice * $orderProduct->quantity,2) }} </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection