@extends('layouts.layout')
@section('currentPage', '- Favorieten')
@section('content')
    <x-loader/>
    <section>
        <div class="rp-content even-column-l-auto | d-grid px-3">
            <div class="rp-side-content container-sm | border-end-2-lg">
                <div class="rp-header-sm | border-bottom-2 px-3 pb-3">
                    <h1 class="fs-800 fw-semi-bold">Repertoire</h1>
                    <p class="rp-sub-header | fs-600 fw-medium">Favorieten</p>
                </div>
                <div class="d-flex d-none-sm justify-content-center">
                    <a class="button-size button-primary | d-flex align-items-center fs-400" href="/songs">
                        <img class="image-w-16 | me-1 py-1 pe-2" src="/img/icon/icon_arrow_left_001_FFFFFF_32x32.svg">Terug naar Repertoire</a>
                </div>
                <div class="rp-nav-list | border-bottom-2">
                    <div class="rp-list-item-sm">
                        <a class="rp-list-link | d-flex align-items-center px-3 fs-500 fw-semi-bold" href="/playlists">
                            <img class="rp-list-img | py-2" aria-hidden="true" src="img/icon/icon_playlist_001_212427_32x32.svg" alt="">Afspeellijsten</a>
                    </div>
                </div>
                <div class="collapsable | d-grid">
                    <div class="collapsable-btn genre-btn even-column-r-auto | d-grid px-4">
                        <p class="fs-500 fw-semi-bold">Genre</p>
                        <img class="collapsable-img" aria-hidden="true" src="img/icon/icon_arrow_down_001_212427_32x32.svg" alt="">
                    </div>
                </div>
                <div class="collapsable-content | py-2">
                    <div class="py-1 px-3">
                        <label class="collapsable-item">Dance
                            <input type="checkbox"/><span></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="rp-main-content container-sm">
                <div class="even-column-r-auto | d-grid align-items-center">
                    <div class="rp-header">
                        <h1 class="fs-700 fw-semi-bold">Repertoire</h1>
                        <p class="rp-sub-header | fs-400 fw-semi-bold">Favorieten</p>
                    </div>
                    <x-search-sm/>
                </div>
                <div class="collapsable-sm">
                    <div class="collapsable-btn-sm | d-flex justify-content-center px-4">
                        <p class="fs-500 fw-semi-bold">Filteren</p>
                        <img class="collapsable-sm-img | ps-2" src="img/icon/icon_filter_001_FFFFFF_32x32.svg">
                    </div>
                </div>
                <div>
                    <div class="rp-sidenav">
                        <div class="rp-sidenav-header | d-grid align-items-center py-3 px-4 w-100">
                            <h2 class="fs-700 fw-semi-bold">Filteren</h2>
                            <div class="close-btn | d-flex justify-content-end fs-700 fw-semi-bold">
                                <img class="rp-sidenav-close" src="img/icon/icon_cross_001_212427_32x32.svg"></div>
                        </div>
                        <div class="collapsable-btn sort-btn even-column-r-auto-sm | d-grid px-4">
                            <p class="fs-500 fw-semi-bold">Sorteren Op</p>
                            <img class="collapsable-img" src="img/icon/icon_arrow_down_001_212427_32x32.svg">
                        </div>
                        <div class="collapsable-content-sm rp-sort-sm | py-2">
                            <form class="rp-sort-form" action="#" method="GET">

                            </form>
                        </div>
                        <div class="collapsable-sm">
                            <div class="collapsable-btn genre-btn-sm even-column-r-auto-sm | d-grid px-4">
                                <p class="fs-500 fw-semi-bold">Genre</p>
                                <img class="collapsable-img" src="img/icon/icon_arrow_down_001_212427_32x32.svg">
                            </div>
                        </div>
                        <div class="collapsable-content-sm rp-genre-sm | py-2">
                            <div class="py-1 px-3">
                                <label class="collapsable-item">Dance
                                    <input type="checkbox" /><span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rp-sort | border-top-2 py-2">
                    <form action="#" method="GET">

                    </form>
                </div>

                <div class="table-content" id="table-songs">
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
                        @foreach($songs as $key => $song)
                            @if(\Maize\Markable\Models\Favorite::has($song, auth()->user()))
                            <tr class="table-row song_{{$song['id']}}">
                                <td class="table-column-md | fw-semi-bold text-center">{{$key + 1}}</td>
                                <td class="table-column-lg">
                                    <img class="table-column-img" src="{{asset('storage/' . $song['path_cover_art'])}}"
                                         alt="Albumhoes {{$song['title']}}">
                                </td>
                                <td class="table-column-xxl-left | text-start">
                                    <div class="table-column-xxl-content-top">{{$song['title']}}</div>
                                    <div class="table-column-xxl-content-bottom">{{$song['artist']}}</div>
                                </td>
                                <td class="table-column-xxl-right | text-start"><div class="table-column-xxl-right-content">{{$song['artist']}}</div></td>
                                <td class="table-column-xl">{{$song['genre']}}</td>
                                <td class="table-column-xl | text-center">{{date("d-m-Y", strtotime($song['created_at']))}}</td>
                                <td class="table-column-sm">
                                    <form action="{{ route('song.favourite', $song['id']) }}" method="post">
                                        @csrf
                                        <button class="table-column-sm-btn @if(\Maize\Markable\Models\Favorite::has($song, auth()->user()))favorite-fill @endif | d-flex align-items-center" type="submit">
                                            <svg width="32.099998" height="30.637501" viewBox="0 0 32.1 30.6" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <polygon class="favorite" points="16,1.5 20.6,10.7 31,12.2 23.5,19.4 25.3,29.5 16,24.7 6.7,29.5 8.5,19.4 1,12.2 11.4,10.7 "/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="table-column-sm">
                                    <img class="table-column-icon" src="img/icon/icon_download_001_212427_32x32.svg">
                                </td>
                                <td class="table-column-lg">
                                    <a class="table-column-link" href="{{ route('songs.show', $song['id']) }}"><img
                                            class="table-column-icon" src="img/icon/icon_more_001_212427_32x32.svg"></a>
                                    <button class="table-column-button"><img
                                            class="table-column-icon" src="img/icon/icon_more_001_212427_32x32.svg">
                                    </button>
                                </td>
                                <div class="table-menu song_{{$song['id']}}">
                                    <div class="table-menu-content | px-3">
                                        <img class="table-img" src="{{asset('storage/' . $song['path_cover_art'])}}"
                                             alt="Albumhoes {{$song['title']}}">
                                        <div class="table-txt-content | pt-4">
                                            <p class="table-txt | fw-semi-bold text-center">{{$song['title']}}</p>
                                            <p class="table-txt | pb-2 text-center">{{$song['artist']}}</p>
                                            <p class="pt-2 text-center">{{$song['genre']}}</p>
                                            <p class="text-center">{{date("d-m-Y", strtotime($song['created_at']))}}</p>
                                        </div>
                                    </div>
                                    <ul class="table-list">
                                        <li class="table-list-item">
                                        <form action="{{ route('song.favourite', $song['id']) }}" method="post">
                                        @csrf
                                        <button class="table-column-sm-btn @if(\Maize\Markable\Models\Favorite::has($song, auth()->user()))favorite-fill @endif | d-flex align-items-center" type="submit">
                                            <svg width="32.099998" height="30.637501" viewBox="0 0 32.1 30.6" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <polygon class="favorite" points="16,1.5 20.6,10.7 31,12.2 23.5,19.4 25.3,29.5 16,24.7 6.7,29.5 8.5,19.4 1,12.2 11.4,10.7 "/>
                                            </svg>
                                            <div class="table-list-link | fs-500 fw-semi-bold">Favorieten</div>
                                        </button>
                                    </form>
                                        <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold" href="">
                                            <img class="table-list-icon" src="img/icon/icon_download_001_212427_32x32.svg">Download</a></li>
                                        <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold" href="{{ route('songs.show', $song['id']) }}">
                                            <img class="table-list-icon" src="img/icon/icon_more_001_212427_32x32.svg">Details</a></li>
                                    </ul>
                                    <div class="table-bottom | py-4 fw-bold text-center">
                                        <button class="table-close">Sluiten</button>
                                    </div>
                                </div>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
    </section>

    <!-- <section class="section">
        <div class="container">
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
    </section>
    {{--    table--}}
    <section class="section">
        <div class="container">
            <table class="table w-25">
                @foreach($songs as $song)
                    @if(\Maize\Markable\Models\Favorite::has($song, auth()->user()))
                        <tr>
                            <td>
                                <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}"
                                     alt="Albumhoes {{$song->title}}">
                            </td>
                            <td>{{$song->name}}</td>
                            <td>{{$song->artist}}</td>
                            <td>{{$song->album}}</td>
                            <td>{{$song->genre}}</td>
                            <td><a href="{{ route('songs.show', $song) }}">Details</a></td>
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
                                        <svg width='24' height='24' viewBox='0 0 24 24'
                                             xmlns='http://www.w3.org/2000/svg'
                                             xmlns:xlink='http://www.w3.org/1999/xlink'>
                                            <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                            <g transform="matrix(0.4 0 0 0.4 12 12)">
                                                <path
                                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                                    transform=" translate(-25, -24.8)"
                                                    d="M 25 1 C 24.587448437819113 1.0003573899416984 24.21745171913152 1.2540028470630233 24.068359 1.638671900000001 L 17.902344 17.535156 L 0.94921875 18.400391 C 0.5361244089496606 18.421301271604477 0.1785245802706652 18.694352310895226 0.04954463953851285 19.08735148259298 C -0.07943530119363951 19.480350654290728 0.04682045204112706 19.912200156205603 0.36718749999999956 20.173828 L 13.568359 30.966797 L 9.2324219 47.34375 C 9.12646962864894 47.742800908399424 9.276630584445037 48.1659432996735 9.610426980225581 48.40894016686066 C 9.944223376006123 48.65193703404781 10.393034545033865 48.66483395207868 10.740234 48.441406 L 25 39.289062 L 39.259766 48.441406 C 39.60696545264548 48.66483388017553 40.055776569605634 48.651936924345584 40.38957292468266 48.408940070673886 C 40.72336927975969 48.16594321700219 40.873530228824 47.742800877413245 40.767578 47.34375 L 36.431641 30.966797 L 49.632812 20.173828 C 49.95317902219769 19.912200187302915 50.079434793103644 19.480350742069874 49.950454914740824 19.087351591605163 C 49.821475036378004 18.69435244114045 49.46387529654981 18.421301366962094 49.050781 18.400391 L 32.097656 17.535156 L 25.931641 1.6386719 C 25.782548280868475 1.2540028470630227 25.412551562180887 1.0003573899416978 25 1 z M 25 4.7636719 L 30.466797 18.861328 C 30.60968898779115 19.229141631031354 30.955496183370457 19.478551484728474 31.349609 19.498047 L 46.359375 20.265625 L 34.667969 29.826172 C 34.36460539586974 30.074211371141768 34.23404925803034 30.47656788718194 34.333984 30.855469 L 38.175781 45.369141 L 25.541016 37.257812 C 25.211478939746424 37.04585360168865 24.788521060253576 37.04585360168865 24.458984 37.257812 L 11.824219 45.369141 L 15.666016 30.855469 C 15.765950741969661 30.47656788718194 15.635394604130266 30.074211371141768 15.332031 29.826172 L 3.640625 20.265625 L 18.650391 19.498047 C 19.044503816629543 19.478551484728474 19.39031101220885 19.229141631031354 19.533203 18.861328 L 25 4.7636719 z"
                                                    stroke-linecap="round"/>
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </section>-->
@endsection
