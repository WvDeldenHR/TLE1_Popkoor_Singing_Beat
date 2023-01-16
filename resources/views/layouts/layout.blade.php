<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Popkoor Singing Beat @yield('currentPage')</title>
        <!-- Scripts -->
        <script src="{{ asset('js/songPlayHandler.js') }}" defer></script>
        <script src="{{ asset('js/songCreateHandler.js') }}" defer></script>
        <script src="{{ asset('js/fileExtensionGetter.js') }}" defer></script>
        <!-- Imports PDF-viewer -->
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css" rel="stylesheet" type="text/css"/>
        <script src="{{ asset('js/pdfViewer.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/songPlayer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/songPlayerPlaylist.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pdfViewer.css') }}" rel="stylesheet">
        <!-- Favicon and App Icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#5f3f6d">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#5f3f6d">
    </head>

    <body>
        <header class="primary-header container-lg">
            <div class="primary-header-content">
                <a class="nav-logo" href="{{ route('home')}}">
                    <img src="/img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat">
                </a>
                <div class="nav-hamburger-area" aria-controls="nav-hamburger" aria-expanded="false">
                    <div class="nav-hamburger"></div>
                </div>
                <nav class="nav">
                    <div class="nav-content">
                        <ul class="nav-list" aria-label="Primary" role="list">
                            <li class="nav-list-item"><a class="nav-list-link" href="">Over Ons</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="/events">Evenementen</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="/songs">Repertoire</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="/PhotoAlbums">Fotoalbums</a></li>
                            <li class="nav-list-item"><a class="nav-list-link" href="">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="nav-user">
                    @guest
                        @if (Route::has('login'))
                        <a class="nav-btn button-primary" href="{{ route('login') }}">Inloggen</a>
                        <a class="nav-user-icon-btn" href="{{ route('login') }}">
                            <img class="nav-user-icon" src="/img/icon/icon_user_001_212427_32x32.svg" aria-hidden="true" alt="">
                        </a>
                        @endif
                    @else
                        <div class="nav-user-btn button-primary" href="{{ route('login') }}">
                            <span>{{ Auth::user()->name }}</span>
                            <img class="nav-user-avatar"src="/img/popkoor_singing_beat_001.jpg" aria-hidden="true" alt="Profielfoto">
                        </div>
                        <button class="nav-user-icon-btn">
                            <img class="nav-user-icon" src="/img/icon/icon_user_001_212427_32x32.svg" aria-hidden="true" alt="Gebruiker">
                        </button>

                        <div class="nav-dropdown content-box | flex-column">
                            <ul class="py-2">
                                <li class="nav-dropdown-list-item | py-1 ps-2 pe-3">
                                    <a class="nav-dropdown-list-link | d-flex align-items-center fs-400 fw-semi-bold" href="">
                                        <img class="nav-user-icon" src="/img/icon/icon_user_001_212427_32x32.svg">Account</a></li>
                                <li class="nav-dropdown-list-item nav-border-bottom | py-1 ps-2 pe-3">
                                    <a class="nav-dropdown-list-link | d-flex align-items-center fs-400 fw-semi-bold" href="{{ route('favourites') }}">
                                        <img class="nav-user-icon" src="/img/icon/icon_favorite_003_212427_32x32.svg">Favorieten</a></li>
                                @if(Auth::user()->role == 1)
                                <li class="nav-dropdown-list-item nav-border-bottom | py-1 ps-2 pe-3">
                                    <a class="nav-dropdown-list-link | d-flex align-items-center fs-400 fw-semi-bold" href="">
                                        <img class="nav-user-icon" src="/img/icon/icon_users_001_212427_32x32.svg">Leden Overzicht</a></li>
                                @endif
                                <li class="nav-dropdown-list-item | py-1 ps-2 pe-3">
                                    <a class="nav-dropdown-list-link | d-flex align-items-center fs-400 fw-semi-bold" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <img class="nav-user-icon" src="/img/icon/icon_logout_001_212427_32x32.svg">Uitloggen</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> 
                            </ul>
                        </div>
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
                    <img src="/img/popkoor_singing_beat_logo.svg" alt="Popkoor Singing Beat">
                </a>
                <ul class="footer-list" role="list" aria-label="Footer">
                    <li class="footer-list-item"><a class="footer-list-link" href="">Contact</a></li>
                    <li class="footer-list-item"><a class="footer-list-link" href="">Over Ons</a></li>
                </ul>
                <ul class="footer-contact">
                    <li class="footer-list-item">contact@popkoorsingingbeat.nl</li>
                    <li class="footer-list-item">+31 018 163 9892</li>
                    <li class="footer-list-item">Spijkenisse, Nederland</li>
                </ul>
                <ul class="footer-socials | d-flex" role="list" aria-label="Social links">
                    <li class="footer-socials-item | px-1"><a href="https://www.facebook.com/popkoorsingingbeat" target="_blank" aria-label="facebook">
                        <img aria-hidden="true" src="/img/icon/icon_socials_facebook_001_212427_32x32.svg" alt="Facebook"></a></li>
                    <li class="footer-socials-item | px-1"><a href="https://www.instagram.com/explore/tags/popkoorsingingbeat/" target="_blank" aria-label="instagram">
                        <img aria-hidden="true" src="/img/icon/icon_socials_instagram_001_212427_32x32.svg" alt="Instagram"></a></li>
                    <li class="footer-socials-item | px-1"><a href="https://www.youtube.com/@popkoorsingingbeat758" target="_blank" aria-label="youtube">
                        <img aria-hidden="true" src="/img/icon/icon_socials_youtube_001_212427_32x32.svg" alt="Youtube"></a></li>
                </ul>
                <p class="footer-copyright | pt-3 fs-300 fw-light">© Popkoor Singing Beat 2001 - 2022</p>
            </div>
                <p class="footer-privacy | fs-300 fw-light">Privacybeleid</p>
        </footer>

        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>
