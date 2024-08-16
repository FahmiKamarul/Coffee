<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/file.png" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kopi Coffee</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <!-- Scripts -->
</head>
<body>
    <div id="app">
        <nav class="">
            <div class="">
                <div class="logo">
                    <a class="" href="{{ url('/') }}">
                        <img src="/img/1600w-AkT-50lhy8M.webp" alt="">
                        KOPI COFFEE
                    </a>
                </div>

                <div class="navcontent" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="logbutton">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="logbutton">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="dropdownbutton">
                                <div class="namebutton">
                                    
                                    {{ Auth::user()->name }}
                                    <img src="/img/1123247-200-removebg-preview.png" alt="" >
                                </div>
                                <ul class="dropdown">
                                    <li>
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        
                                    </li>
                                    
                                    <li >
                                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                   
                                    
                                </ul>
                                
                            </div>
                        @endguest
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
