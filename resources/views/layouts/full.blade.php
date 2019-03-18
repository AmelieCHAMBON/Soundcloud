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
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    
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
                <li><a href="/nouvelle" data-pjax><i class="far fa-plus-square"></i></a></li>
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
        <div id="audio" class="holder">
      <div class="audio green-audio-player">
        <div class="play-pause-btn">  
            <i class="fas fa-pause play-pause-icon" id="playPause"></i>
        </div>

        <div class="controls">
          <span class="current-time">0:00</span>
          <div class="slider" data-direction="horizontal">
            <div class="progress">
              <div class="pin" id="progress-pin" data-method="rewind"></div>
            </div>
          </div>
          <span class="total-time">0:00</span>
        </div>

        <div class="volume">
          <div class="volume-btn">
              <i class="fas fa-volume-up" id="speaker"></i>
          </div>
        </div>

        <audio id="player" src=""></audio>
      </div>
    </div>


    <div id="main">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>



    </body>
</html>