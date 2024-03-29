@extends('layouts.layout')
@section('currentPage', $song->title)
@section('content')
    <section id="sectionSongPlayer">
        <div class="player even-column-3 | d-grid py-3 px-4">
            <div class="player-start | d-flex align-items-center">
                <div class="player-img">
                    @if($song->path_cover_art !== null)
                        <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                    @endif
                </div>
                <div class="px-3">
                    <p id="playerCurrentSong" class="player-txt-light | fs-300 fw-semi-bold">{{$song->title}}</p>
                    <p class="player-txt | fs-300">{{$song->artist}}</p>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center">

                <div class="d-flex justify-content-center py-2">
                    <button class="player-button player-button-disabled" id="shuffleButton">
                        <img class="player-icon-sm" src="/img/icon/icon_shuffle_001_FFFFFF_32x32.svg">
                    </button>
                    <button class="player-button | mx-3" id="backButton">
                        <img class="player-icon-sm image-invert-x" src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
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

    <section class="px-3">
        <div class="button-box container-lg">
            <a class="button-size button-primary | d-flex align-items-center fs-400" href="/songs">
                <img class="image-w-16 | me-1 py-1 pe-2" src="/img/icon/icon_arrow_left_001_FFFFFF_32x32.svg">Terug naar Repertoire</a>
        </div>
        <div class="sg-box container even-column-r-auto | d-grid pt-4">
            <div class="">
                <div class="d-flex">
                    <div class="">
                        @if($song->path_cover_art !== null)
                            <img class="sg-img img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                        @endif
                    </div>
                    <div class="d-grid align-self-end px-4 py-3">
                        <p id="songTitleBig" class="sg-txt | fs-700 fw-bold">{{$song->title}}</p>
                        <p class="sg-sub | pb-3 fs-600 fw-semi-bold">{{$song->artist}}</p>
                        <p class="sg-low-txt | fs-300">{{$song->album}}</p>
                        <p class="fs-300">{{$song->genre}}</p>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role == 1)
            <div class="d-none-lg">
                <button class="button-size button-primary-alt">Aanpassen</button>
            </div>
            @endif
        </div>

        <div>
            <div class="container-lg | pt-5 pb-3">
                <h2 class="fs-700 fw-bold">Beschikbare Stempartijen<h2>
            </div>
            <div class=" table-content table-content-sm container">
                <table class="sg-content w-100 tableDontHideTableColumnMd">
                    <!-- Full Song -->
                    @if($song->path_track !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Volledig Nummer</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track)}}"
                            download="{{$song->artist}} - {{$song->title}}.mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Instrumental -->
                    @if($song->path_track_instrumental  !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Instrumentaal</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_instrumental )}}"
                            download="{{$song->artist}} - {{$song->title}} (Instrumentaal).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Solo -->
                    @if($song->path_track_solo !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Solopartij</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_solo)}}"
                            download="{{$song->artist}} - {{$song->title}} (Solo).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Soprano 1 -->
                    @if($song->path_track_soprano_1 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Hoog 1</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_1)}}"
                            download="{{$song->artist}} - {{$song->title}} (Hoog 1).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Soprano 2 -->
                    @if($song->path_track_soprano_2 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Hoog 2</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_2)}}"
                            download="{{$song->artist}} - {{$song->title}} (Hoog 2).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Contralto 1 -->
                    @if($song->path_track_contralto_1 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Hoog-Midden 1</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_1)}}"
                            download="{{$song->artist}} - {{$song->title}} (Hoog Midden 1).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Contralto 2 -->
                    @if($song->path_track_contralto_2 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Hoog-Midden 2</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_2)}}"
                            download="{{$song->artist}} - {{$song->title}} (Hoog Midden 2).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Track Tenor 1 -->
                    @if($song->path_track_tenor_1 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Laag-Midden 1</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_1)}}"
                            download="{{$song->artist}} - {{$song->title}} (Laag Midden 1).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Track Tenor 2 -->
                    @if($song->path_track_tenor_2 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Laag-Midden 2</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_2)}}"
                            download="{{$song->artist}} - {{$song->title}} (Laag Midden 2).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Track Bass 1 -->
                    @if($song->path_track_bass_1 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Laag 1</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_1)}}"
                            download="{{$song->artist}} - {{$song->title}} (Laag 1).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                    <!-- Track Bass 2 -->
                    @if($song->path_track_bass_2 !== null)
                    <tr class="table-row">
                        <td class="table-column-md table-column-start | fw-semi-bold text-center playButtonList">▶</td>
                        <td class="table-column-lg">
                            @if($song->path_cover_art !== null)
                                <img class="table-column-img" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                            @endif
                        </td>
                        <td class="table-column-xxl">Laag 2</td>
                        <td></td>
                        <td class="table-column-sm table-column-end">
                            <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_2)}}"
                            download="{{$song->artist}} - {{$song->title}} (Laag 2).mp3" target="_blank">
                                <img class="table-column-icon" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="pt-3">
            <div class="container-lg border-top-2 | py-3">
               <h2 class="fs-700 fw-bold">Liedtekst</h2>
            </div>
            <div class="container">
                <div id="pdf_container"></div>
            </div>
        </div>

        <div class="py-3">
            <div class="container-lg border-top-2 | py-3">
                <h2 class="fs-700 fw-bold">PDF Downloads</h2>
            </div>
            <div class="container sg-download-box | d-grid justify-content-center">
                @if($song->path_song_text !== null)
                    <div class="sg-download-content | d-grid align-items-center py-2">
                        <p class="justify-self-start fw-semi-bold">Liedtekst</p>
                        <a class="justify-self-end" id="FilePDF" href="{{asset('storage/' . $song->path_song_text)}}"
                            download="{{$song->title}}-{{$song->artist}}-liedtekst.pdf" target="_blank">
                            <img class="sg-icon image-w-24" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                    </div>
                @endif
                @if($song->path_song_text_dutch !== null)
                    <div class="sg-download-content | d-grid align-items-center py-2">
                        <p class="justify-self-start fw-semi-bold">Liedtekst Vertaling</p>
                        <a class="justify-self-end" href="{{asset('storage/' . $song->path_song_text_dutch)}}"
                            download="{{$song->title}}-{{$song->artist}}-liedtekst_Nederlands.pdf" target="_blank">
                            <img class="sg-icon image-w-24" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                    </div>
                @endif
                @if($song->path_sheets !== null)
                    <div class="sg-download-content | d-grid align-items-center py-2">
                        <p class="justify-self-start fw-semi-bold">Bladmuziek</p>
                        <a class="justify-self-end" href="{{asset('storage/' . $song->path_sheets)}}"
                            download="{{$song->title}}-{{$song->artist}}-bladmuziek.pdf" target="_blank">
                            <img class="sg-icon image-w-24" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                    </div>
                @endif
                @if($song->path_directions !== null)
                    <div class="sg-download-content | d-grid align-items-center py-2">
                        <p class="justify-self-start fw-semi-bold">Koorregie</p>
                        <a class="justify-self-end" href="{{asset('storage/' . $song->path_directions)}}"
                            download="{{$song->title}}-{{$song->artist}}-koorregie.pdf" target="_blank">
                            <img class="sg-icon image-w-24" src="/img/icon/icon_download_001_212427_32x32.svg"></a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection


