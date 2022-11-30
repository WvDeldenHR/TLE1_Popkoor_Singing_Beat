<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name = “theme-color” content = “#5f3f6d”>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Popkoor Singing Beat</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <header class="primary-header container-lg">
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
                            <li class="nav-list-item"><a class="nav-list-link" href="/events">Events</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="/songs">Repertoire</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Fotoalbum</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="nav-user">
                    @guest
                        @if (Route::has('login'))
                        <a class="nav-btn button-primary" href="{{ route('login') }}">Inloggen</a>
                        <a class="nav-user-icon-btn" href="{{ route('login') }}">
                            <img class="nav-user-icon" src="img/icon/icon_user_001_212427_32x32.svg">
                        </a>
                        @endif
                    @else
                        <div class="nav-user-btn button-primary" href="{{ route('login') }}">
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

        <main>
        @yield('content')
        </main>

        <footer class="mt-5">
            <div class="footer-content even-column-3 container-lg">
                <a class="footer-logo" href="{{ route('home')}}">
                    <img src="img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat">
                </a>
                <ul class="footer-list" role="list" aria-label="Footer">
                    <li class="footer-list-item"><a class="footer-list-link" href="">Contact</a></li>
                    <li class="footer-list-item"><a class="footer-list-link" href="">Over Ons</a></li>
                </ul>
                <ul class="footer-contact">
                    <li class="footer-list-item">contact@popkoorsingingbeat.nl</li>
                    <li class="footer-list-item">+31 018 163 9892</li>
                    <li class="footer-list-item">Spijknisse, Nederland</li>
                </ul>
                <ul class="footer-socials | d-flex" role="list" aria-label="Social links">
                    <li class="footer-socials-item | px-1"><a href="" aria-label="facebook"><img src="img/icon/icon_socials_facebook_001_212427_32x32.svg"></a></li>
                    <li class="footer-socials-item | px-1"><a href="" aria-label="instagram"><img src="img/icon/icon_socials_instagram_001_212427_32x32.svg"></a></li>
                    <li class="footer-socials-item | px-1"><a href="" aria-label="youtube"><img src="img/icon/icon_socials_youtube_001_212427_32x32.svg"></a></li>
                </ul>
                <p class="footer-copyright | pt-3 fs-300 fw-light">© Popkoor Singing Beat 2001 - 2022</p>
            </div>
                <p class="footer-privacy | fs-300 fw-light">Privacybeleid</p>
        </footer>

        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>