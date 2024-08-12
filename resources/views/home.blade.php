@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="">
                <div class="">{{ __('Dashboard') }}</div>

                <div class="">
                    @if (session('status'))
                        <div class="" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
