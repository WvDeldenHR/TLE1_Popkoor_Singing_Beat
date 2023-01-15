<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Popkoor Singing Beat @yield('currentPage')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/songPlayHandler.js') }}" defer></script>
    <script src="{{ asset('js/songCreateHandler.js') }}" defer></script>
    <script src="{{ asset('js/fileExtensionGetter.js') }}" defer></script>

    <!-- Imports PDF-viewer -->
    <script defer type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="{{ asset('js/pdfViewer.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/songPlayer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pdfViewer.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/playlists">Playlists</a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/playlists/create">Create playlist</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/PhotoAlbums">Albums</a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/photos/create">Create albums</a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/events">Events</a>
                    </li>
                    @auth()
                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/events/create">Create event</a>
                            </li>
                        @endif
                    @endauth
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="/songs">Repertoire</a>
                        </li>
                        @if(auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/songs/create">Create song</a>
                            </li>
                        @endif
                    @endauth
                <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
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
