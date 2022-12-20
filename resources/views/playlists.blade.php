@extends('layouts.layout')

@section('content')
    <section>
        <div class="container | pt-5 px-3">
            <div class="even-column-r-auto | d-grid align-items-center">
                <div class="pl-header">
                    <h1 class="fs-700 fw-bold">Afspeellijsten</h1>
                </div>
                <x-search-sm/>
            </div>

            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Afspeellijst Toevoegen</h2>
                <div class="pl-box-content | d-grid">
                    <a class="pl-box content-box pl-box-icon-add | p-3" href="/playlists/create">
                        <div class="pl-box-img"></div>
                        <div class="pl-box-header | pt-3 fw-semi-bold">Toevoegen</div>
                    </a>
                </div>
            </div>
            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Meest Recent</h2>
                <div class="pl-box-content pl-box-content-lg">
                    @for($i = 0; $i < 5; $i++)
                        <a class="pl-box content-box pl-box-icon-playlist | p-3" href="{{ route('playlists.show', $playlists[$i]) }}">
                            <div class="pl-box-img"></div>
                            <div class="pl-box-header | pt-3 fw-semi-bold">{{$playlists[$i]->title}}</div>
                        </a>
                    @endfor
                </div>
                <div class="pl-box-content pl-box-content-sm">
                    @for($i = 0; $i < 2; $i++)
                        <a class="pl-box content-box pl-box-icon-playlist | p-3" href="{{ route('playlists.show', $playlists[$i]) }}">
                            <div class="pl-box-img"></div>
                            <div class="pl-box-header | pt-3 fw-semi-bold">{{$playlists[$i]->title}}</div>
                        </a>
                    @endfor
                </div>
            </div>
            <div class="pl-content | pb-3">
                <h2 class="pt-4 pb-3 fs-600 fw-semi-bold ">Alle Afspeellijsten</h2>
                <div class="pl-box-content | d-grid">
                    @foreach($playlistAlfabetical as $playlist)
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

