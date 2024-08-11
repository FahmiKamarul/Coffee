@extends('layouts.layout')

@section('content')
<div class="container" style="width:1100px;height:600px;">
    <div class="header"style="height:auto;">
        <div style="display:flex;flex-direction:row;">
            <div style="display:flex;flex-direction:column; ">
                <h2 style="margin-bottom:5px;">Order</h2>
                orders found
            </div>
            <div class="icon"> 
                
                <div class="searchHolder" style="display:flex;flex-direction:row;">
                    <input type="text" name="" placeholder="Search..."id="searchHolder" >
                    <img src="/img/109-1092659_search-icon-small-png-clipart-removebg-preview.png" alt="name"style="width:15px;height:15px;margin:7.5px;">
                </div>
                <div>
                    <img src="/img/3119338-removebg-preview.png"style="width:20px;height:20px;margin:5px;" alt="">
                </div>
            </div>
        </div>
        <div>
            <div style="display:flex;flex-direction:row; margin-top:10px;"class="accessible">
                <a href="/orderManagement/all-orders" class="{{ request()->is('orderManagement/all-orders*') ? 'active' : '' }}"><div>All Order</div></a>
                <a href="/orderManagement/dispatch" class="{{ request()->is('orderManagement/dispatch*') ? 'active' : '' }}"><div>Dispatch</div></a>
                <a href="/orderManagement/pending" class="{{ request()->is('orderManagement/pending*') ? 'active' : '' }}"><div>Pending</div></a>
                <a href="/orderManagement/completed" class="{{ request()->is('orderManagement/completed*') ? 'active' : '' }}"><div>Completed</div></a>
            </div>
        </div>
        <div class="access-bar">
            <div style="margin-left:5px;">ID</div>
            <div style="margin-left:30px;">Name</div>
            <div style="margin-left:30px;">Address</div>
            <div style="margin-left:30px;">Date</div>
            <div style="margin-left:30px;">Price</div>
            <div style="margin-left:30px;">Status</div>
            <div style="margin-left:30px;">Action</div>
        </div>
    </div>
    @foreach($orders as $order)
            
        <div class="orderline">
            {{$order->orderID}}
        
        </div>
    @endforeach
</div>

@endsection