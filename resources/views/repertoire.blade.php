@extends('layouts.layout')

@section('content')
    <section>
        <div class="rp-content even-column-2-l-auto | d-grid">
            <div class="rp-nav | px-4">
                <div class="rp-header | px-3 pb-3">
                    <h2 class="fs-800 fw-semi-bold">Repertoire</h2>
                    <p class="fs-600 fw-medium">Alle Nummers</p>
                </div>
                <div>
                    <ul class="rp-nav-list">
                        <li class="rp-list-item">
                            <a class="rp-list-link | fw-semi-bold" href=""><img src="img/icon/icon_playlist_001_212427_32x32.svg">Afspeellijsten</a>
                        </li>
                        <li class="rp-list-item">
                            <a class="rp-list-link | fw-semi-bold" href="{{ route('favourites') }}"><img src="img/icon/icon_favorite_002_212427_32x32.svg">Favorieten</a>
                        </li>
                        <li class="rp-list-item">
                            <a class="rp-list-link | fw-semi-bold" href="/songs/create"><img src="img/icon/icon_add_001_212427_32x32.svg">Toevoegen</a>
                        </li>
                    </ul>
                </div>
                <div class="rp-list">
                    <h3 class="fw-semi-bold">Recent Toegevoegde Afspeellijsten</h3>
                    <div>
                    </div>
                </div>
            </div>

            <div>
                <div class="">
                    <div class=""></div>
                    <div class="rp-top-header-section | d-grid">
                        <div class="rp-top-btn-genre | d-flex justify-content-center py-3"><h3 class="fw-semi-bold">Genre</h3><img src="img/icon/icon_arrow_down_001_212427_32x32.svg"></div>
                        <div class="rp-top-btn-sort | d-flex justify-content-center rp-top-header-mid | py-3"><h3 class="fw-semi-bold">Sorteren</h3><img src="img/icon/icon_arrow_down_001_212427_32x32.svg"></div>
                        <div class="d-flex justify-content-center py-3"><h3 class="fw-semi-bold">Favorieten</h3><img src="img/icon/icon_favorite_002_212427_32x32.svg"></div>
                    </div>
                    <div class="">
                        <div class="rp-top-menu-genre">
                            <button>Dance</button>
                            <button>Pop</button>
                        </div>
                        <div class="rp-top-menu-sort">
                            <button>A-Z (Titel)</button>
                            <button>A-Z (Artiest)</button>
                            <button>Meest Recent</button>
                            <button>Z-A (Titel)</button>
                            <button>Z-A (Artiest)</button>
                        </div>
                    </div>
                    <!-- <div class="rp-nav-top-s">
                        <h3 class="fw-semi-bold">Genre</h3>
                    </div>
                    <div class="rp-nav-top-center">
                        <h3 class="fw-semi-bold">Filteren</h3>
                    <form action="#" method="GET">
                        <button class="btn btn-light mb-2" type="submit" name="sort" value="A-Z">
                            <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                                xmlns:xlink='http://www.w3.org/1999/xlink'>
                                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(1 0 0 1 12 12)">
                                    <path
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" translate(-12.5, -12)"
                                        d="M 6.8007812 2 L 4 10 L 6 10 L 6.3652344 9 L 8.6308594 9 L 9 10 L 11 10 L 8.1992188 2 L 6.8007812 2 z M 16 2 L 16 18 L 13 18 L 17 22 L 21 18 L 18 18 L 18 2 L 16 2 z M 7.546875 5.2636719 L 8.0664062 7 L 6.9335938 7 L 7.546875 5.2636719 z M 4 13 L 4 15 L 8 15 L 4 19.5625 L 4 21 L 11 21 L 11 19 L 7 19 L 11 14.419922 L 11 13 L 4 13 z"
                                        stroke-linecap="round"/>
                                </g>
                            </svg>
                        </button>
                        <button class="btn btn-light mb-2" type="submit" name="sort" value="Z-A">
                            <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                                xmlns:xlink='http://www.w3.org/1999/xlink'>
                                <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                <g transform="matrix(1 0 0 1 12 12)">
                                    <path
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" translate(-12.5, -12)"
                                        d="M 4 2 L 4 4 L 8 4 L 4 8.5625 L 4 10 L 11 10 L 11 8 L 7 8 L 11 3.4199219 L 11 2 L 4 2 z M 16 2 L 16 18 L 13 18 L 17 22 L 21 18 L 18 18 L 18 2 L 16 2 z M 6.8007812 13 L 4 21 L 6 21 L 6.3652344 20 L 8.6308594 20 L 9 21 L 11 21 L 8.1992188 13 L 6.8007812 13 z M 7.546875 16.263672 L 8.0664062 18 L 6.9335938 18 L 7.546875 16.263672 z"
                                        stroke-linecap="round"/>
                                </g>
                            </svg>
                        </button>
                    </form>
                </div>
                    <div class="rp-nav-top-e">
                        <h3 class="fw-semi-bold">Zoeken</h3>
                    <form action="#" method="GET">
                        <input class="rp-search" type="text" name="search" placeholder="Zoeken"
                            value="{{request('search')}}">
                            <button class="btn btn-primary mb-2" type="submit">Search</button>
                        </input>
                    </form>
                </div>-->
            </div>


                <div class="table-content">
                    <table class="w-100">
                        <tr class="table-row-header">
                            <th class="table-column-md | fw-semi-bold text-center">#</th>
                            <th class="table-column-lg"></th>
                            <th class="table-column-xxl | fw-semi-bold text-start">Titel</th>
                            <th class="table-column-xxl | fw-semi-bold text-start">Artiest</th>
                            <th class="table-column-xl | fw-semi-bold text-start">Genre</th>
                            <th class="table-column-xl | fw-semi-bold">Datum Toegevoegd</th>
                            <th class="table-column-sm"></th>
                            <th class="table-column-sm"></th>
                            <th class="table-column-lg"></th>
                        </tr>
                        <tr class="table-row">
                            <td class="table-column-md | fw-semi-bold text-center">1</td>
                            <td class="table-column-lg">
                                <img class="table-column-img" src="img/ASCEND (Remixes).jpg">
                            </td>
                            <td class="table-column-xxl-left | text-start">
                                <div class="table-column-xxl-content-top">Broken Ones (feat. Anna Clendening) [Last Heroes Remix]</div>
                                <div class="table-column-xxl-content-bottom">ILLENIUM & Last Heroes</div>
                            </td>
                            <td class="table-column-xxl-right | text-start">ILLENIUM & Last Heroes</td>
                            <td class="table-column-xl">Dance</td>
                            <td class="table-column-xl | text-center">2-12-2022</td>
                            <td class="table-column-sm">
                                <img class="table-column-icon" src="img/icon/icon_favorite_002_212427_32x32.svg">
                            </td>
                            <td class="table-column-sm">
                                <img class="table-column-icon" src="img/icon/icon_download_001_212427_32x32.svg">
                            </td>
                            <td class="table-column-lg">
                                <a class="table-column-link" href=""><img class="table-column-icon" src="img/icon/icon_more_001_212427_32x32.svg"></a>
                                <button class="table-column-button" onclick="openNav()"><img class="table-column-icon" src="img/icon/icon_more_001_212427_32x32.svg"></button>
                            </td>
                            <div class="table-menu">
                                <div class="table-menu-content | pt-7 px-3">
                                    <img class="table-img" src="img/ASCEND (Remixes).jpg">
                                    <div class="table-txt-content | pt-4 pb-5">
                                    <p class="table-txt | fw-semi-bold text-center">Broken Ones (feat. Anna Clendening) [Last Heroes Remix]</p>
                                    <p class="table-txt | pb-2 text-center">ILLENIUM & Last Heroes</p>
                                    <p class="pt-2 text-center">Dance</p>
                                    <p class="text-center">3-12-2022</p>
                                    </div>
                                </div>
                                <ul class="table-list">
                                    <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold" href="">
                                        <img class="table-list-icon" src="img/icon/icon_favorite_002_212427_32x32.svg">Favoriet</a></li>
                                    <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold" href="">
                                        <img class="table-list-icon" src="img/icon/icon_download_001_212427_32x32.svg">Download</a></li>
                                    <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold" href="">
                                        <img class="table-list-icon" src="img/icon/icon_more_001_212427_32x32.svg">Details</a></li>
                                </ul>
                                <div class="table-bottom | py-4 fw-bold text-center"><button class="table-close">Sluiten</button></div>
                            </div>
                        </tr>
                        <tr class="table-row">
                            <td class="table-column-md | fw-semi-bold text-center">2</td>
                            <td class="table-column-lg">
                                <img class="table-column-img" src="img/Dogma Resistance.jpg">
                            </td>
                            <td class="table-column-xxl-left | text-start">
                                <div class="table-column-xxl-content-top">Overkill</div>
                                <div class="table-column-xxl-content-bottom">RIOT</div>
                            </td>
                            <td class="table-column-xxl-right | text-start">RIOT</td>
                            <td class="table-column-xl">Dance</td>
                            <td class="table-column-xl | text-center">2-12-2022</td>
                            <td class="table-column-sm">
                                <img class="table-column-icon" src="img/icon/icon_favorite_002_212427_32x32.svg">
                            </td>
                            <td class="table-column-sm">
                                <img class="table-column-icon" src="img/icon/icon_download_001_212427_32x32.svg">
                            </td>
                            <td class="table-column-lg">
                                <img class="table-column-icon" src="img/icon/icon_more_001_212427_32x32.svg">
                            </td>
                        </tr>
                    </table>
                </div>

                <!--
                <div class="rp-table-content">
                    <table class="rp-table">
                    @foreach($songs as $song)
                    <tr>
                        <td></td>
                        <td>
                            <img class="img-thumbnail"
                                src="{{asset('storage/' . $song->cover_art)}}"
                                alt="cover art {{$song->name}}">
                        </td>
                        <td>{{$song->name}}</td>
                        <td>{{$song->artist}}</td>
                        <td>{{$song->genre}}</td>
                        <td>{{$song->album}}</td>
                        <td>
                            <form action="{{ route('song.favourite', $song->id) }}" method="post">
                                @csrf
                                <button class="btn
                                @if(\Maize\Markable\Models\Favorite::has($song, auth()->user()))
                                    btn-warning
                                @else
                                    btn-light
                                @endif
                                    mb-2" type="submit">
                                    <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                                        xmlns:xlink='http://www.w3.org/1999/xlink'>
                                        <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                        <g transform="matrix(0.7 0 0 0.7 12 12)">
                                            <path
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                                transform=" translate(-16, -15.77)"
                                                d="M 16 2.125 L 15.09375 4.1875 L 11.84375 11.46875 L 3.90625 12.3125 L 1.65625 12.5625 L 3.34375 14.0625 L 9.25 19.40625 L 7.59375 27.21875 L 7.125 29.40625 L 9.09375 28.28125 L 16 24.28125 L 22.90625 28.28125 L 24.875 29.40625 L 24.40625 27.21875 L 22.75 19.40625 L 28.65625 14.0625 L 30.34375 12.5625 L 28.09375 12.3125 L 20.15625 11.46875 L 16.90625 4.1875 Z M 16 7.03125 L 18.5625 12.8125 L 18.8125 13.34375 L 19.375 13.40625 L 25.65625 14.0625 L 20.96875 18.28125 L 20.53125 18.6875 L 20.65625 19.25 L 21.96875 25.40625 L 16.5 22.28125 L 16 21.96875 L 15.5 22.28125 L 10.03125 25.40625 L 11.34375 19.25 L 11.46875 18.6875 L 11.03125 18.28125 L 6.34375 14.0625 L 12.625 13.40625 L 13.1875 13.34375 L 13.4375 12.8125 Z"
                                                stroke-linecap="round"/>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td><img src=""></td>
                        <td><a href="{{ route('songs.show', $song) }}"><img src=""></a></td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>-->
        </div>
    </section>
@endsection

