@extends('layouts.layout')

@section('content')
    <x-loader/>
    <section>
        <div class="rp-content even-column-l-auto | d-grid px-3">
            <div class="rp-side-content container-sm | border-end-2-lg">
                <div class="rp-header-sm | border-bottom-2 px-3 pb-3">
                    <h1 class="fs-800 fw-semi-bold">Repertoire</h1>
                    <p class="rp-sub-header | fs-600 fw-medium">Alle Nummers</p>
                </div>
                <div class="rp-nav-list | border-bottom-2">
                    <div class="rp-list-item-sm">
                        <a class="rp-list-link | d-flex align-items-center px-3 fs-500 fw-semi-bold" href="/playlists">
                            <img class="rp-list-img | py-2" src="img/icon/icon_playlist_001_212427_32x32.svg">Afspeellijsten</a>
                    </div>
                    <div class="rp-list-item">
                        <a class="rp-list-link | d-flex align-items-center px-3 fs-500 fw-semi-bold" href="/songs/create">
                            <img class="rp-list-img | py-2" src="img/icon/icon_add_001_212427_32x32.svg">Toevoegen</a>
                    </div>
                </div>
                <div class="collapsable | d-grid">
                        <a class="collapsable-btn | px-4 fs-500 fw-semi-bold" href="{{route('favourites')}}">Favorieten</a>
                    <div class="collapsable-btn genre-btn even-column-r-auto | d-grid px-4">
                        <p class="fs-500 fw-semi-bold">Genre</p>
                        <img class="collapsable-img" src="img/icon/icon_arrow_down_001_212427_32x32.svg">
                    </div>
                </div>
                <div class="collapsable-content | py-2">
                    <div class="py-1 px-3">
                        <label class="collapsable-item">Dance
                            <input type="checkbox" /><span></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="rp-main-content container-sm">
                <div class="even-column-r-auto | d-grid align-items-center">
                    <div class="rp-header">
                        <h1 class="fs-700 fw-semi-bold">Repertoire</h1>
                        <p class="rp-sub-header | fs-400 fw-semi-bold">Alle Nummers</p>
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
                                <button class="rp-sort-btn @if($currentSort == 'A-Z_Title') rp-sort-btn-active @endif | m-1" 
                                        type="submit" name="sort" value="A-Z_Title">A-Z (Titel)</button>
                                <button class="rp-sort-btn @if($currentSort == 'Z-A_Title') rp-sort-btn-active @endif | m-1" 
                                        type="submit" name="sort" value="Z-A_Title">Z-A (Titel)</button>
                                <button class="rp-sort-btn @if($currentSort == 'A-Z_Artist') rp-sort-btn-active @endif | m-1" 
                                        type="submit" name="sort" value="A-Z_Artist">A-Z (Artiest)</button>
                                <button class="rp-sort-btn @if($currentSort == 'Z-A_Artist') rp-sort-btn-active @endif | m-1" 
                                        type="submit" name="sort" value="Z-A_Artist">Z-A (Artiest)</button>
                                <button class="rp-sort-btn @if($currentSort == 'Most_Recent') rp-sort-btn-active @endif | m-1" 
                                        type="submit" name="sort" value="Most_Recent">Meest Recent</button>
                            </form>
                        </div>
                        <div class="collapsable-sm">
                                <a class="collapsable-btn | px-4 fs-500 fw-semi-bold" href="{{route('favourites')}}">Favorieten</a>
                            <div class="collapsable-btn genre-btn-sm even-column-r-auto-sm | d-grid px-4">
                                <p class="fs-500 fw-semi-bold">Genre</p>
                                <img class="collapsable-img" src="img/icon/icon_arrow_down_001_212427_32x32.svg">
                            </div>
                        </div>
                        <div class="rp-collapsable-content-sm rp-genre-sm | py-2">
                            <div class="py-1 px-3">
                                <label class="rp-collapsable-item">Dance
                                    <input type="checkbox" /><span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rp-sort | border-top-2 py-2">
                    <form action="#" method="GET">
                        <button class="rp-sort-btn @if($currentSort == 'A-Z_Title') rp-sort-btn-active @endif | m-1" 
                                type="submit" name="sort" value="A-Z_Title">A-Z (Titel)</button>
                        <button class="rp-sort-btn @if($currentSort == 'Z-A_Title') rp-sort-btn-active @endif | m-1" 
                                type="submit" name="sort" value="Z-A_Title">Z-A (Titel)</button>
                        <button class="rp-sort-btn @if($currentSort == 'A-Z_Artist') rp-sort-btn-active @endif | m-1" 
                                type="submit" name="sort" value="A-Z_Artist">A-Z (Artiest)</button>
                        <button class="rp-sort-btn @if($currentSort == 'Z-A_Artist') rp-sort-btn-active @endif | m-1" 
                                type="submit" name="sort" value="Z-A_Artist">Z-A (Artiest)</button>
                        <button class="rp-sort-btn @if($currentSort == 'Most_Recent') rp-sort-btn-active @endif | m-1" 
                                type="submit" name="sort" value="Most_Recent">Meest Recent</button>
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
                                        <button class="table-column-sm-btn @if($song['isFavorite'])favorite-fill @endif | d-flex align-items-center" type="submit">
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
                                        <button class="table-column-sm-btn @if($song['isFavorite'])favorite-fill @endif | d-flex align-items-center" type="submit">
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
                        @endforeach
                    </table>
                </div>
            </div>
    </section>
@endsection