<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/file.png" type="image/x-icon"/>
    <title>Kopi Coffee</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" id="twentyfifteen-fonts-css" href="https://fonts.googleapis.com/css?family=Quicksand%3A300%2C400%2C700%7CJosefin%2BSans%3A400%2C400italic%2C700%2C700italic%2C600%2C600italic%7CFredoka+One&amp;subset=latin%2Clatin-ext" type="text/css" media="all">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/sales.css') }}">
</head>
<body>

    <header>
        <nav>
            <a href="/order" style="text-decoration:none;">
            <div class="main-logo">
                <img src="/img/1600w-AkT-50lhy8M.webp" alt="hello">
                <span>KOPI COFFEE</span>
            </div>
            </a>
            <ul>
                <li>
                    Home
                </li>
                <li>
                    Blog
                </li>
                <li>
                    About Us
                </li>
                <li>
                    Contact
                </li>
            </ul>
            <ul>
                <li>
                    <img src="/img/109-1092659_search-icon-small-png-clipart-removebg-preview.png" alt="">
                </li>
                <a href="/profile">
                    <li>
                        <img src="/img/istockphoto-1332100919-612x612-removebg-preview.png" alt="">
                    </li>
                </a>
                <li>
                    <img src="/img/1077035-removebg-preview.png" alt="">
                </li>
            </ul>
        </nav>
    </header>
    @yield('mainpage')
<body>  
@yield('scripts')
</html>
