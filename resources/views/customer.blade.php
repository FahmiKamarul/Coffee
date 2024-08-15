@extends('layouts.layout')

@section('content')
<div class="container" style="width:700px">
    <div class="header" style="height:auto;padding:20px;">
        <h2>Customers</h2>
    </div>
    <div class="allcustomers"style="background-color:#F4F4F4;">
        <div>ID</div>
        <div>Name</div>
        <div>Address</div>
        <div>Email</div>
    </div>
    <div style="">
        @foreach($customers as $customer)
        <div class="allcustomers">
            <div>{{$customer->id}} </div>
            <div>{{$customer->name}}</div>
            <div>{{$customer->address}}</div>
            <div>{{$customer->email}}</div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection