<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <header class="primary-header pt-4">
            <div class="primary-header-content container d-flex align-items-center justify-content-between py-1">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="{{ route('home')}}"><img src="" alt="Popkoor Singing Beat"></a>
                    <nav class="nav">
                        <ul class="nav-list" aria-label="Primary" role="list">
                            <li><a href="">Over Ons</a></li>
                            <li><a href="">Events</a></li>
                            <li><a href="">Repertoire</a></li>
                            <li><a href="">Fototalbum</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    @guest
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="button | d-sm-none d-md-inline-flex">Inloggen</a>
                        @endif
                    @else
                        <div class="nav-user" aria-controls="nav-user" aria-expanded="false">
                            <div class="nav-user-icon">
                                <img src="img/icon/icon_user_001_212427_32x32.svg">
                            </div>
                            <div class="nav-user-content align-items-center">
                                <span>{{ Auth::user()->name }}</span>
                                <img class="nav-avatar"src="img/popkoor_singing_beat_001.jpg">
                            </div>
                            <div class="nav-dropdown">
                                <div class="d-flex flex-column">
                                    <a href="">Account</a>
                                    <a href="">Repertoire</a>
                                    <a href="">Leden</a>            <!--  Needs to be Admin Only -->
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Uitloggen
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                    <div class="nav-hamburger" aria-controls="nav-hamburger" aria-expanded="false">
                        <div class="nav-hamburger-bar1"></div>
                        <div class="nav-hamburger-bar2"></div>
                        <div class="nav-hamburger-bar3"></div>
                        <span class="visually-hidden">Menu</span>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>