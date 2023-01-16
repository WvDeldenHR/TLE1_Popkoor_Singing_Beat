@extends('layouts.layout')
@section('currentPage', '- Afspeellijsten')
@section('content')
    <section>
        <div class="button-box container">
            <a class="button-size button-primary | d-flex align-items-center fs-400" href="/songs">
                <img class="image-w-16 | me-1 py-1 pe-2" src="/img/icon/icon_arrow_left_001_FFFFFF_32x32.svg">Terug naar Repertoire</a>
        </div>
        <div class="container | pt-3 px-3">
            <div class="even-column-r-auto | d-grid align-items-center">
                <div class="pl-header">
                    <h1 class="fs-700 fw-bold">Afspeellijsten</h1>
                </div>
                <x-search-sm/>
            </div>
            @if(Auth::user()->role == 1)
            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Afspeellijst Toevoegen</h2>
                <div class="pl-box-content | d-grid">
                    <a class="pl-box content-box pl-box-icon-add | p-3" href="/playlists/create">
                        <div class="pl-box-img"></div>
                        <div class="pl-box-header | pt-3 fw-semi-bold">Toevoegen</div>
                    </a>
                </div>
            </div>
            @endif
            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Meest Recent</h2>
                <div class="pl-box-content | d-grid">
                    @foreach($playlistsRecent as $playlistRecent)
                        <a class="pl-box content-box pl-box-icon-playlist | p-3" href="{{ route('playlists.show', $playlistRecent) }}">
                            <div class="pl-box-img"></div>
                            <div class="pl-box-header | pt-3 fw-semi-bold">{{$playlistRecent->title}}</div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Alle Afspeellijsten</h2>
                <div class="pl-box-content | d-grid">
                    @foreach($playlistsAlphabetical as $playlist)
                        <a class="pl-box content-box pl-box-icon-playlist | p-3" href="{{ route('playlists.show', $playlist) }}">
                            <div class="pl-box-img"></div>
                            <div class="pl-box-header | pt-3 fw-semi-bold">{{$playlist->title}}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection