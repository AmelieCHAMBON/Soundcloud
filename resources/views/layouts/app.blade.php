<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>
<body>
    
<!-- Authentication Links -->
<nav id="main-menu">
    <a href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <ul>
        @guest
            <li><a href="{{ route('login') }}"><i class="fas fa-user"></i></a></li>
            <li><a href="{{ route('register') }}"><i class="fas fa-book-medical"></i></a></li>
        @else
            <li> Bonjour {{ Auth::user()->name }}</li>
            <li><a href="/nouvelle"><i class="far fa-plus-square"></i></a></li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>

<form id="search">
    <input type="search" name="search" placeholder="Recherche" required/>
    <input type="submit" />
</form>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>