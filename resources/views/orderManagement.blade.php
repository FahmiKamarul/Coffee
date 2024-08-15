@extends('layouts.layout')

@section('content')
<div class="container" style="width:1100px;height:600px;padding:0;">
    <div class="header" style="height:auto;padding:20px;padding-bottom: 0;">
        <div style="display:flex;flex-direction:row;">
            <div style="display:flex;flex-direction:column;">
                <h2 style="margin-bottom:5px;">Order</h2>
                {{$orders->count()}} orders found
            </div>
            <div class="icon"> 
                <div class="searchHolder" style="display:flex;flex-direction:row;">
                    <input type="text" name="" placeholder="Search..." id="searchHolder">
                    <img src="/img/109-1092659_search-icon-small-png-clipart-removebg-preview.png" alt="name" style="width:15px;height:15px;margin:7.5px;">
                </div>
                <div>
                    <img src="/img/3119338-removebg-preview.png" style="width:20px;height:20px;margin:5px;" alt="">
                </div>
            </div>
        </div>
        <div>
            <div style="display:flex;flex-direction:row; margin-top:10px;" class="accessible">
                <a href="/orderManagement/all-orders" class="{{ request()->is('orderManagement/all-orders*') ? 'active' : '' }}"><div>All Order</div></a>
                <a href="/orderManagement/dispatch" class="{{ request()->is('orderManagement/dispatch*') ? 'active' : '' }}"><div>Dispatch</div></a>
                <a href="/orderManagement/pending" class="{{ request()->is('orderManagement/pending*') ? 'active' : '' }}"><div>Pending</div></a>
                <a href="/orderManagement/completed" class="{{ request()->is('orderManagement/completed*') ? 'active' : '' }}"><div>Completed</div></a>
            </div>
        </div>
        <div class="access-bar">
            <div>ID</div>
            <div>Name</div>
            <div>Address</div>
            <div>Date</div>
            <div>Price</div>
            <div><span style="margin-left:20px;">Status</span></div>
            <div><span style="margin-left:13px;">Action</span></div>
        </div>

    </div>
    @foreach($orders as $order)
            
        <div class="orderline">
            <div class="orderline-orderID">
                {{$order->orderID}}
            </div>
            <div class="orderline-orderName">
                {{ $order->user->name }}
            </div>
            <div class="orderline-orderAddress">
                {{$order->user->address}}
            </div>
            
            <div class="orderline-time">
                {{$order->created_at}}
            </div>
            <div class="orderline-orderPrice">
                RM{{ number_format($order->total_price, 2) }}
            </div>
            <div class="orderline-status">
                <form action="{{ route('orders.updateStatus', $order->orderID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="orderStatus" onchange="this.form.submit()">
                        <option value="pending" {{ $order->orderStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="dispatch" {{ $order->orderStatus == 'dispatch' ? 'selected' : '' }}>Dispatch</option>
                        <option value="completed" {{ $order->orderStatus == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </form>
            </div>
            <div><a href="{{ \Illuminate\Support\Str::afterLast(request()->path(), '/') }}/{{$order->orderID}}" style="text-decoration:none;"><div class="managebutton" style="padding:5px;width: 60px;">manage</div></a></div>
        </div>
    @endforeach
    
</div>

@yield('ordercontent')
@endsection
