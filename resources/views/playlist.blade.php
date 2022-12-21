@extends('layouts.layout')

@section('content')
    <x-loader/>

    <section>
        <div class="container | pt-5">
            <div>
                <a href="/playlists">Terug naar Afspeellijsten</a>
            </div>
            <div>
                <h1 class="fw-semi-bold">{{$playlist->title}}</h1>
            </div>
            <div>
                <p>{{$playlist->description}}</p>
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
                        @foreach($playlist->songs as $song)
                            <tr class="table-row song_{{$song['id']}}">
                                <td class="table-column-md | fw-semi-bold text-center">
                                {{$loop->iteration}}
                                </td>
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

