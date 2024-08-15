@extends('layouts.saleslayout')

@section('mainpage')
<div style="display:flex;flex-direction:row;">
    <div class="container">
        <div class="heading">{{ __('Profile') }}</div>
        <form method="POST" action="/profile "enctype="multipart/form-data" class="profileform">
            {{ csrf_field() }}
            @method('PATCH')
            <div >

                <label for="customerName">{{ __('Name') }}</label>

                <div >
                    <input id="customerName"  name="customerName"  value="{{ Auth::user()->name }}" required >

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <div >
                <label for="customerEmail" >{{ __('Email Address') }}</label>

                <div >
                    <input id="customerEmail" type="email"  name="customerEmail" value="{{ Auth::user()->email }}" required >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="customerAddress" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                <div >
                    <input id="customerAddress" type="text" name="customerAddress" value="{{ Auth::user()->address }}" >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <input type="submit"  value="Update">
            
        </form>
        <div class="logbutton">
            <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>

    <div class="container">
        <div class="heading">All Order</div>
        <div style="padding:10px;">
            @foreach($orders as $order)
            <div class="orderline">
                <div>{{$order->orderStatus}}</div>
                <div>RM{{ number_format($order->total_price, 2) }}</div>
                <div></div>
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
@endsection