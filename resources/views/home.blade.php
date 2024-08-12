@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="heading">{{ __('Notice') }}</div>

    <div class="">
        @if (session('status'))
            <div class="" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
    <div style="display: flex; justify-content: center;margin-top:100px;">
        <a href="/upload">
            <div class="dash">
                dashboard
            </div>
        </a>
    </div>

</div>
@endsection
