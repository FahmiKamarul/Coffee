@extends('layouts.saleslayout')

@section('mainpage')
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
@endsection