@extends('layouts.layout')

@section('content')
    <section>
        <div class="player even-column-3 | d-grid py-3 px-4">
            <div class="d-flex align-items-center">
                <div class="player-img">
                    @if($song->path_cover_art !== null)
                        <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}" alt="Albumhoes {{$song->title}}">
                    @endif
                </div>
                <div class="px-3">
                    <p class="player-txt-light | fs-300 fw-semi-bold">{{$song->title}}</p>
                    <p class="player-txt | fs-300">{{$song->artist}}</p>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <div class="d-none" id="autoPlayNextSong">false</div>
                
                <div class="d-flex justify-content-center py-2">
                    <button class="player-button player-button-disabled">
                        <img class="player-icon-sm" src="/img/icon/icon_shuffle_001_FFFFFF_32x32.svg">
                    </button>
                    <button class="player-button player-button-disabled | mx-3">
                        <img class="player-icon-sm image-invert" src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                    </button>

                    <button class="player-button | mx-2" id="playButton">
                        <img class="player-icon-md" id="playButtonIcon" src="/img/icon/icon_play_001_FFFFFF_32x32.svg">
                    </button>

                    <button class="player-button player-button-disabled | mx-3">
                        <img class="player-icon-sm " src="/img/icon/icon_next_001_FFFFFF_32x32.svg">
                    </button>
                    <button class="player-button player-button-disabled">
                        <img class="player-icon-sm" src="/img/icon/icon_repeat_001_FFFFFF_32x32.svg">
                    </button>
                </div>

                <div class="d-flex align-items-center">
                    <span class="player-time | fs-300" id="currentTimeTxt">0:00</span>
                    <div class="player-content | mt-2 mb-1 mx-2">
                        <div class="player-slider-track"></div>
                        <input class="player-input" id="playerSlider" type="range" value="0" />
                    </div>
                    <span class="player-time | fs-300" id="totalTimeTxt">0:00</span>
                </div>

                <div class="d-none" id="playerPlaylist"></div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
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

    <section class="section">
        <div class="container">
            <h1>{{$song->title}} - {{$song->artist}}</h1>
            <h2>{{$song->album}} - {{$song->genre}}</h2>

            @if($song->path_cover_art !== null)
                <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}"
                     alt="Albumhoes {{$song->title}}">
            @endif
            

            <div>
                <h2>Liedtekst</h2>
                <div id="pdf_container"></div>
            </div>

            <div>
                <h2>Downloads</h2>
                <h3>Nummers</h3>
                @if($song->path_track !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track)}}"
                       download="{{$song->title}}-{{$song->artist}}-compleet.mp3" target="_blank">Compleet</a>
                @endif
                @if($song->path_track_solo !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_solo)}}"
                       download="{{$song->title}}-{{$song->artist}}-solo.mp3" target="_blank">Solo</a>
                @endif
                @if($song->path_track_instrumental  !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_instrumental )}}"
                       download="{{$song->title}}-{{$song->artist}}-instrumentaal.mp3" target="_blank">Instrumentaal</a>
                @endif
                @if($song->path_track_soprano_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_1)}}"
                       download="{{$song->title}}-{{$song->artist}}-hoog_1.mp3" target="_blank">Hoog 1</a>
                @endif
                @if($song->path_track_soprano_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_2)}}"
                       download="{{$song->title}}-{{$song->artist}}-hoog_2.mp3" target="_blank">Hoog 2</a>
                @endif
                @if($song->path_track_contralto_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_1)}}"
                       download="{{$song->title}}-{{$song->artist}}-hoog-midden_1.mp3" target="_blank">Hoog-Midden 1</a>
                @endif
                @if($song->path_track_contralto_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_2)}}"
                       download="{{$song->title}}-{{$song->artist}}-hoog-midden_2.mp3" target="_blank">Hoog-Midden 2</a>
                @endif
                @if($song->path_track_tenor_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_1)}}"
                       download="{{$song->title}}-{{$song->artist}}-laag-midden_2.mp3" target="_blank">Laag-Midden 1</a>
                @endif
                @if($song->path_track_tenor_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_2)}}"
                       download="{{$song->title}}-{{$song->artist}}-laag-midden_2.mp3" target="_blank">Laag-Midden 2</a>
                @endif
                @if($song->path_track_bass_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_1)}}"
                       download="{{$song->title}}-{{$song->artist}}-laag_1.mp3" target="_blank">Laag 1</a>
                @endif
                @if($song->path_track_bass_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_2)}}"
                       download="{{$song->title}}-{{$song->artist}}-laag_2.mp3" target="_blank">Laag 2</a>
                @endif
                <h3>Liedtekst & andere bestanden</h3>
                @if($song->path_song_text !== null)
                    <a id="FilePDF" href="{{asset('storage/' . $song->path_song_text)}}"
                       download="{{$song->title}}-{{$song->artist}}-liedtekst.pdf" target="_blank">Liedtekst</a>
                @endif
                @if($song->path_song_text_dutch !== null)
                    <a href="{{asset('storage/' . $song->path_song_text_dutch)}}"
                       download="{{$song->title}}-{{$song->artist}}-liedtekst_Nederlands.pdf" target="_blank">Liedtekst
                        Nederlands</a>
                @endif
                @if($song->path_sheets !== null)
                    <a href="{{asset('storage/' . $song->path_sheets)}}"
                       download="{{$song->title}}-{{$song->artist}}-bladmuziek.pdf" target="_blank">Bladmuziek</a>
                @endif
                @if($song->path_directions !== null)
                    <a href="{{asset('storage/' . $song->path_directions)}}"
                       download="{{$song->title}}-{{$song->artist}}-koorregie.pdf" target="_blank">Koorregie</a>
                @endif
            </div>
        </div>
    </section>
@endsection


