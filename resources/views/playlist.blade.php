@extends('layouts.layout')
@section('currentPage', '- Afspeellijst ' . $playlist->title)
@section('content')
    <x-loader/>
    <section id="sectionSongPlayerPlaylist">
        <div class="player even-column-3 | d-grid py-3 px-4">
            <div class="player-start | d-flex align-items-center">
                <div class="player-img">
                    <img id="songPlayerImg" class="img-thumbnail" src="" alt="">

                </div>
                <div class="px-3">
                    <p id="playerCurrentSong" class="player-txt-light | fs-300 fw-semi-bold">Title</p>
                    <p id="playerCurrentArtist" class="player-txt | fs-300">Artist</p>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center">

                <div class="d-flex justify-content-center py-2">
                    <button class="player-button player-button-disabled" id="shuffleButton">
                        <img class="player-icon-sm" src="/img/icon/icon_shuffle_001_FFFFFF_32x32.svg">
                    </button>
                    <button class="player-button | mx-3" id="backButton">
                        <img class="player-icon-sm image-invert" src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                    </button>

                    <button class="player-button | mx-2" id="playButton">
                        <img class="player-icon-md" id="playButtonIcon" src="/img/icon/icon_play_001_FFFFFF_32x32.svg">
                    </button>

                    <button class="player-button | mx-3" id="forwardButton">
                        <img class="player-icon-sm" src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                    </button>
                    <button class="player-button player-button-disabled" id="repeatButton">
                        <img class="player-icon-sm" id="repeatButtonIcon" src="/img/icon/icon_repeat_001_FFFFFF_32x32.svg">
                    </button>
                </div>

                <div class="d-flex align-items-center">
                    <span class="player-time | fs-300" id="currentTimeTxt">0:00</span>
                    <div class="player-content | mt-2 mb-1 mx-2">
                        <div class="player-slider-track"></div>
                        <input class="player-input" id="playerToggle" type="range" value="0" />
                    </div>
                    <span class="player-time | fs-300" id="totalTimeTxt">0:00</span>
                </div>

                <div class="d-none" id="playerPlaylist"></div>
            </div>
            <div class="player-end | d-flex align-items-center justify-content-end">
                <button class="player-button" id="muteButton">
                    <img class="player-icon-sm" id="muteButtonIcon" src="/img/icon/icon_sound_001_FFFFFF_32x32.svg">
                </button>
                <div class="player-volume | mx-2">
                    <div class="player-volume-slider-track"></div>
                    <input class="player-volume-input" id='volumeSlider' type="range" value="100" />
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="button-box container">
            <a class="button-size button-primary | d-flex align-items-center fs-400" href="/playlists">
                <img class="image-w-16 | me-1 py-1 pe-2" src="/img/icon/icon_arrow_left_001_FFFFFF_32x32.svg">Terug naar Afspeellijsten</a>
        </div>
        <div class="container | pt-3">
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
                            <td class="table-column-md | fw-semi-bold text-center">▶</td>
                            <td class="table-column-lg">
                                <img class="table-column-img" src="{{asset('storage/' . $song['path_cover_art'])}}"
                                     alt="Albumhoes {{$song['title']}}">
                            </td>
                            <td class="table-column-xxl-left | text-start">
                                <div class="table-column-xxl-content-top">{{$song['title']}}</div>
                                <div class="table-column-xxl-content-bottom">{{$song['artist']}}</div>
                            </td>
                            <td class="table-column-xxl-right | text-start">
                                <div class="table-column-xxl-right-content">{{$song['artist']}}</div>
                            </td>
                            <td class="table-column-xl">{{$song['genre']}}</td>
                            <td class="table-column-xl | text-center">{{date("d-m-Y", strtotime($song['created_at']))}}</td>
                            @if($song['path_track'])<td class="d-none audioFile">{{asset('storage/' . $song->path_track)}}</td> @endif
                            <td class="table-column-sm">
                                <form action="{{ route('song.favourite', $song['id']) }}" method="post">
                                    @csrf
                                    <button
                                        class="table-column-sm-btn @if($song['isFavorite']) favorite-fill @endif | d-flex align-items-center"
                                        type="submit">
                                        <svg width="32.099998" height="30.637501" viewBox="0 0 32.1 30.6" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <polygon class="favorite"
                                                     points="16,1.5 20.6,10.7 31,12.2 23.5,19.4 25.3,29.5 16,24.7 6.7,29.5 8.5,19.4 1,12.2 11.4,10.7 "/>
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
                                            <button
                                                class="table-column-sm-btn @if($song['isFavorite'])favorite-fill @endif | d-flex align-items-center"
                                                type="submit">
                                                <svg width="32.099998" height="30.637501" viewBox="0 0 32.1 30.6"
                                                     version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <polygon class="favorite"
                                                             points="16,1.5 20.6,10.7 31,12.2 23.5,19.4 25.3,29.5 16,24.7 6.7,29.5 8.5,19.4 1,12.2 11.4,10.7 "/>
                                                </svg>
                                                <div class="table-list-link | fs-500 fw-semi-bold">
                                                    @if($song['isFavorite'])
                                                        Verwijder van Favorieten
                                                    @else
                                                        Voeg toe aan Favorieten
                                                    @endif</div>
                                            </button>
                                        </form>
                                    <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold"
                                                                   href="">
                                            <img class="table-list-icon"
                                                 src="img/icon/icon_download_001_212427_32x32.svg">Download</a></li>
                                    <li class="table-list-item"><a class="table-list-link | fs-500 fw-semi-bold"
                                                                   href="{{ route('songs.show', $song['id']) }}">
                                            <img class="table-list-icon" src="img/icon/icon_more_001_212427_32x32.svg">Details</a>
                                    </li>
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

