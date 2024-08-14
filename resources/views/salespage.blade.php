@extends('layouts.saleslayout')

@section('mainpage')
<span style="background-color:grey;display: flex; font-size: 30px; width: 100%; justify-content: center; align-items: center; text-align: center;">
    Select Item to Buy
    </span>
<div class="selection">
@foreach($products as $product)
    <button>
        <img src="{{ asset('storage/coffeList/' . $product->productImage) }}" alt="">
    </button>
@endforeach
</div>
<div class="cart-icon">
    <img src="/img/1413908-removebg-preview.png" alt="">
</div>

@endsection