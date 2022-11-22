<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name = “theme-color” content = “#5f3f6d”>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Popkoor Singing Beat</title>

        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <!-- CSS -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <header class="primary-header nav-container">
            <div class="primary-header-content">
                <a class="nav-logo" href="{{ route('home')}}">
                    <img src="img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat">
                </a>
                <div class="nav-hamburger-area" aria-controls="nav-hamburger">
                    <div class="nav-hamburger" aria-expanded="false"></div>
                </div>
                <nav class="nav">
                    <div class="nav-content">
                        <ul class="nav-list" aria-label="Primary" role="list">
                            <li class="nav-list-item"><a class="nav-list-link" href="">Over Ons</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Events</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Repertoire</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Fotoalbum</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="nav-user">
                    @guest
                        @if (Route::has('login'))
                        <a class="nav-btn" href="{{ route('login') }}">Inloggen</a>
                        <a class="nav-user-icon-btn" href="{{ route('login') }}">
                            <img class="nav-user-icon" src="img/icon/icon_user_001_212427_32x32.svg">
                        </a>
                        @endif
                    @else
                        <div class="nav-btn nav-user-btn" href="{{ route('login') }}">
                            <span>{{ Auth::user()->name }}</span>
                            <img class="nav-user-avatar"src="img/popkoor_singing_beat_001.jpg">
                        </div>
                        <button class="nav-user-icon-btn">
                            <img class="nav-user-icon" src="img/icon/icon_user_001_212427_32x32.svg">
                        </button>
                    @endguest
                </div>
            </div>
        </header>

        @yield('content')

        <footer>
            <div></div>
        </footer>
        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>