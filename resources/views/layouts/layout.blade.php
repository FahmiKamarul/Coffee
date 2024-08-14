<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kopi Coffee</title>
    <link rel="stylesheet" id="twentyfifteen-fonts-css" href="https://fonts.googleapis.com/css?family=Quicksand%3A300%2C400%2C700%7CJosefin%2BSans%3A400%2C400italic%2C700%2C700italic%2C600%2C600italic%7CFredoka+One&amp;subset=latin%2Clatin-ext" type="text/css" media="all">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
</head>
    
    
<body>  
    <nav>
        <div class="mainlogo">
            <img src="/img/1600w-AkT-50lhy8M.webp" alt="" class="logo">
            <span class="logoname">Kopi Coffee</span>
        </div>
        <span>Main Menu</span>
        <ul class="navigation-bar">
            <a href="/upload" class="{{ request()->is('upload*') ? 'active' : '' }}"><li>
                <img src="/img/download-removebg-preview.png" alt="">
                dashboard
            </li></a>
            <a href="/orderManagement" class="{{ request()->is('orderManagement*') ? 'active' : '' }}"><li>
                <img src="/img/1413908-removebg-preview.png" alt="">
                Manage Order
            </li></a>
            <a href="/orderManagement"><li>
                <img src="/img/3126647-removebg-preview.png" alt="">
                Customer
            </li></a>
            <a href="/orderManagement"><li>
                <img src="/img/coupon-icon-2048x1281-jrkntosz-removebg-preview.png" alt="">
                Coupon Code
            </li></a>
            <a href="/orderManagement"><li>
                <img src="/img/filetransaction.png" alt="">
                Transaction
            </li></a>
        </ul>
        <div class="admin-nav">
            <span>Admin</span>
            
            <a href="/login" >
                
                <button class="user-button">
                    {{ Auth::user()->name }}
                </button>
                
            </a>
        </div>
    </nav>
    <div class="content">
        @yield('content')
        
    </div>
</body>

</html>
