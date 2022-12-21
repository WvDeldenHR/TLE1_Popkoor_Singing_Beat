@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{$song->title}} - {{$song->artist}}</h1>
            <h2>{{$song->album}} - {{$song->genre}}</h2>

            @if($song->path_cover_art !== null)
                <img class="img-thumbnail" src="{{asset('storage/' . $song->path_cover_art)}}"
                     alt="Albumhoes {{$song->title}}">
            @endif
            <div>
                <h2>Afspelen</h2>
                <div id="audioPlayerContainer">
                    <!-- Hidden variable for autoplay-->
                    <div style="display: none" id="autoPlayNextSong">false</div>

                    <!-- (A) PLAY/PAUSE BUTTON -->
                    <button id="playButton" disabled>
                        <span id="playButtonIcon" class="material-icons">
                            play_arrow
                        </span>
                    </button>

                    <!-- (B) TIME -->
                    <div id="playTime">
                        <span id="currentTime"></span> / <span id="totalTime"></span>
                    </div>

                    <!-- (C) SEEK BAR -->
                    <input id="progressBar" type="range" min="0" value="0" step="1" disabled/>

                    <!-- (D) VOLUME SLIDE -->
                    <span id="volumeIcon" class="material-icons">volume_up</span>
                    <input id="volumeControl" type="range" min="0" max="1" value="1" step="0.1" disabled/>

                    <!-- (E) PLAYLIST -->
                    <div id="playerPlaylist"></div>
                </div>
            </div>

            <div>
                <h2>Liedtekst</h2>
                <div id="pdf_container"></div>
            </div>

            <div>
                <h2>Downloads</h2>
                <h3>Nummers</h3>
                @if($song->path_track !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track)}}" download="{{$song->title}}-{{$song->artist}}-compleet.mp3" target="_blank">Compleet</a>
                @endif
                @if($song->path_track_solo !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_solo)}}" download="{{$song->title}}-{{$song->artist}}-solo.mp3" target="_blank">Solo</a>
                @endif
                @if($song->path_track_instrumental  !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_instrumental )}}" download="{{$song->title}}-{{$song->artist}}-instrumentaal.mp3" target="_blank">Instrumentaal</a>
                @endif
                @if($song->path_track_soprano_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_1)}}" download="{{$song->title}}-{{$song->artist}}-hoog_1.mp3" target="_blank">Hoog 1</a>
                @endif
                @if($song->path_track_soprano_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_soprano_2)}}" download="{{$song->title}}-{{$song->artist}}-hoog_2.mp3" target="_blank">Hoog 2</a>
                @endif
                @if($song->path_track_contralto_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_1)}}" download="{{$song->title}}-{{$song->artist}}-hoog-midden_1.mp3" target="_blank">Hoog-Midden 1</a>
                @endif
                @if($song->path_track_contralto_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_contralto_2)}}" download="{{$song->title}}-{{$song->artist}}-hoog-midden_2.mp3" target="_blank">Hoog-Midden 2</a>
                @endif
                @if($song->path_track_tenor_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_1)}}" download="{{$song->title}}-{{$song->artist}}-laag-midden_2.mp3" target="_blank">Laag-Midden 1</a>
                @endif
                @if($song->path_track_tenor_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_tenor_2)}}" download="{{$song->title}}-{{$song->artist}}-laag-midden_2.mp3" target="_blank">Laag-Midden 2</a>
                @endif
                @if($song->path_track_bass_1 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_1)}}" download="{{$song->title}}-{{$song->artist}}-laag_1.mp3" target="_blank">Laag 1</a>
                @endif
                @if($song->path_track_bass_2 !== null)
                    <a class="audioFile" href="{{asset('storage/' . $song->path_track_bass_2)}}" download="{{$song->title}}-{{$song->artist}}-laag_2.mp3" target="_blank">Laag 2</a>
                @endif
                <h3>Liedtekst & andere bestanden</h3>
                @if($song->path_song_text !== null)
                    <a id="FilePDF" href="{{asset('storage/' . $song->path_song_text)}}" download="{{$song->title}}-{{$song->artist}}-liedtekst.pdf" target="_blank">Liedtekst</a>
                @endif
                @if($song->path_song_text_dutch !== null)
                    <a href="{{asset('storage/' . $song->path_song_text_dutch)}}" download="{{$song->title}}-{{$song->artist}}-liedtekst_Nederlands.pdf" target="_blank">Liedtekst Nederlands</a>
                @endif
                @if($song->path_sheets !== null)
                    <a href="{{asset('storage/' . $song->path_sheets)}}" download="{{$song->title}}-{{$song->artist}}-bladmuziek.pdf" target="_blank">Bladmuziek</a>
                @endif
                @if($song->path_directions !== null)
                    <a href="{{asset('storage/' . $song->path_directions)}}" download="{{$song->title}}-{{$song->artist}}-koorregie.pdf" target="_blank">Koorregie</a>
                @endif
            </div>
        </div>
    </section>
@endsection


