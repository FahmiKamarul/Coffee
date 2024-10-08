@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">{{ __('Login') }}</div>

    <div class="">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="">
                <label for="email" class="">{{ __('Email Address') }}</label>

                <div class="alignitem">
                    <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="alignitem">
                <label for="password" class="">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" class="" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="rememberme">
                
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
                    
            </div>

            <div class="">
                <div class="">
                    <button type="submit" class="submit">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
