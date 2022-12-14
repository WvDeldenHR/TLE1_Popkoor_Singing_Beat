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
            <!-- Hidden list for Play handles-->
            <div style="display: none" id="songList">
                @if($song->path_track !== null)
                    <p class="songListItem" id="path_track">{{asset('storage/' . $song->path_track)}}</p>
                @endif
                @if($song->path_track_solo !== null)
                    <p class="songListItem" id="path_track_solo">{{asset('storage/' . $song->path_track_solo)}}</p>
                @endif
                @if($song->path_track_instrumental  !== null)
                    <p class="songListItem"
                       id="path_track_instrumental ">{{asset('storage/' . $song->path_track_instrumental )}}</p>
                @endif
                @if($song->path_track_soprano_1 !== null)
                    <p class="songListItem"
                       id="path_track_soprano_1">{{asset('storage/' . $song->path_track_soprano_1)}}</p>
                @endif
                @if($song->path_track_soprano_2 !== null)
                    <p class="songListItem"
                       id="path_track_soprano_2">{{asset('storage/' . $song->path_track_soprano_2)}}</p>
                @endif
                @if($song->path_track_contralto_1 !== null)
                    <p class="songListItem"
                       id="path_track_contralto_1">{{asset('storage/' . $song->path_track_contralto_1)}}</p>
                @endif
                @if($song->path_track_contralto_2 !== null)
                    <p class="songListItem"
                       id="path_track_contralto_2">{{asset('storage/' . $song->path_track_contralto_2)}}</p>
                @endif
                @if($song->path_track_tenor_1 !== null)
                    <p class="songListItem"
                       id="path_track_tenor_1">{{asset('storage/' . $song->path_track_tenor_1)}}</p>
                @endif
                @if($song->path_track_tenor_2 !== null)
                    <p class="songListItem"
                       id="path_track_tenor_2">{{asset('storage/' . $song->path_track_tenor_2)}}</p>
                @endif
                @if($song->path_track_bass_1 !== null)
                    <p class="songListItem" id="path_track_bass_1">{{asset('storage/' . $song->path_track_bass_1)}}</p>
                @endif

                @if($song->path_track_bass_2 !== null)
                    <p class="songListItem" id="path_track_bass_2">{{asset('storage/' . $song->path_track_bass_2)}}</p>
                @endif
            </div>

            <div id="aWrap">
                <!-- (A) PLAY/PAUSE BUTTON -->
                <button id="aPlay" disabled><span id="aPlayIco" class="material-icons">
play_arrow
      </span></button>

                <!-- (B) TIME -->
                <div id="aCron">
                    <span id="aNow"></span> / <span id="aTime"></span>
                </div>

                <!-- (C) SEEK BAR -->
                <input id="aSeek" type="range" min="0" value="0" step="1" disabled/>

                <!-- (D) VOLUME SLIDE -->
                <span id="aVolIco" class="material-icons">volume_up</span>
                <input id="aVolume" type="range" min="0" max="1" value="1" step="0.1" disabled/>

                <!-- (E) PLAYLIST -->
                <div id="aList"></div>
            </div>
            <!--
            <h1>{{$song->title}} - {{$song->artist}}</h1>
            <h2>{{$song->album}} - {{$song->genre}}</h2>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <table class="table">
                <tr>
                    <th>Audio files</th>
                </tr>
                <tr>
                    {{--            audiofiles--}}
            <td>
                <div class="grid">
                    <div class="row">
                        <div class="col-md m-md-1">
                            <p>{{$song->path_0}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_0)}}" type="audio/mp3">
                                    </audio>
                                </div>
                                <div class="col-md m-md-1">
                                    <p>{{$song->path_1}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_1)}}" type="audio/mp3">
                                    </audio>
                                </div>
                                <div class="col-md m-md-1">
                                    <p>{{$song->path_2}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_2)}}" type="audio/mp3">
                                    </audio>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md m-md-1">
                                    <p>{{$song->path_3}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_3)}}" type="audio/mp3">
                                    </audio>
                                </div>
                                <div class="col-md m-md-1">
                                    <p>{{$song->path_4}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_4)}}" type="audio/mp3">
                                    </audio>
                                </div>
                                <div class="col-md m-md-1">
                                    <p>{{$song->path_5}}</p>
                                    <audio class="audioPlayer" controls preload="none">
                                        <source src="{{asset('storage/' . $song->path_5)}}" type="audio/mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
 -->
        </div>
    </section>
@endsection


<script>
    window.addEventListener("DOMContentLoaded", () => {
        // (A) PLAYER INIT
        // (A1) PLAYLIST - CHANGE TO YOUR OWN!
        let playlist = [
            {name: "Alle Stempartijen", src: "{{asset('storage/songs/s1.mp3')}}"},
            {name: "Alleen Bas", src: "{{asset('storage/songs/s2.mp3')}}"},
            {name: "Alleen Tenor", src: "{{asset('storage/songs/s2.mp3')}}"},
            {name: "Alleen Hoog", src: "{{asset('storage/songs/s2.mp3')}}"},
            {name: "Alleen Midden hoog", src: "{{asset('storage/songs/s2.mp3')}}"},
            {name: "Instrumental", src: "{{asset('storage/songs/s3.mp3')}}"}
        ];

        // (A2) AUDIO PLAYER & GET HTML CONTROLS
        const audio = new Audio(),
            aPlay = document.getElementById("aPlay"),
            aPlayIco = document.getElementById("aPlayIco"),
            aNow = document.getElementById("aNow"),
            aTime = document.getElementById("aTime"),
            aSeek = document.getElementById("aSeek"),
            aVolume = document.getElementById("aVolume"),
            aVolIco = document.getElementById("aVolIco"),
            aList = document.getElementById("aList");

        // (A3) BUILD PLAYLIST
        for (let i in playlist) {
            let row = document.createElement("div");
            row.className = "aRow";
            row.innerHTML = playlist[i]["name"];
            row.addEventListener("click", () => {
                audPlay(i);
            });
            playlist[i]["row"] = row;
            aList.appendChild(row);
        }

        // (B) PLAY MECHANISM
        // (B1) FLAGS
        var audNow = 0, // current song
            audStart = false, // auto start next song

            // (B2) PLAY SELECTED SONG
            audPlay = (idx, nostart) => {
                audNow = idx;
                audStart = nostart ? false : true;
                audio.src = playlist[idx]["src"];
                for (let i in playlist) {
                    if (i == idx) {
                        playlist[i]["row"].classList.add("now");
                    } else {
                        playlist[i]["row"].classList.remove("now");
                    }
                }
            };

        // (B3) AUTO START WHEN SUFFICIENTLY BUFFERED
        audio.addEventListener("canplay", () => {
            if (audStart) {
                audio.play();
                audStart = false;
            }
        });

        // (B4) AUTOPLAY NEXT SONG IN THE PLAYLIST
        // audio.addEventListener("ended", () => {
        //     audNow++;
        //     if (audNow >= playlist.length) { audNow = 0; }
        //     audPlay(audNow);
        // });

        // (B5) INIT SET FIRST SONG
        audPlay(0, true);

        // (C) PLAY/PAUSE BUTTON
        // (C1) AUTO SET PLAY/PAUSE TEXT
        audio.addEventListener("play", () => {
            aPlayIco.innerHTML = "pause";
        });
        audio.addEventListener("pause", () => {
            aPlayIco.innerHTML = "play_arrow";
        });

        // (C2) CLICK TO PLAY/PAUSE
        aPlay.addEventListener("click", () => {
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        });

        // (D) TRACK PROGRESS
        // (D1) SUPPORT FUNCTION - FORMAT HH:MM:SS
        let timeString = (secs) => {
            // HOURS, MINUTES, SECONDS
            let ss = Math.floor(secs),
                hh = Math.floor(ss / 3600),
                mm = Math.floor((ss - (hh * 3600)) / 60);
            ss = ss - (hh * 3600) - (mm * 60);

            // RETURN FORMATTED TIME
            if (hh > 0) {
                mm = mm < 10 ? "0" + mm : mm;
            }
            ss = ss < 10 ? "0" + ss : ss;
            return hh > 0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}`;
        };

        // (D2) INIT SET TRACK TIME
        audio.addEventListener("loadedmetadata", () => {
            aNow.innerHTML = timeString(0);
            aTime.innerHTML = timeString(audio.duration);
        });

        // (D3) UPDATE TIME ON PLAYING
        audio.addEventListener("timeupdate", () => {
            aNow.innerHTML = timeString(audio.currentTime);
        });

        // (E) SEEK BAR
        audio.addEventListener("loadedmetadata", () => {
            // (E1) SET SEEK BAR MAX TIME
            aSeek.max = Math.floor(audio.duration);

            // (E2) USER CHANGE SEEK BAR TIME
            var aSeeking = false; // USER IS NOW CHANGING TIME
            aSeek.addEventListener("input", () => {
                aSeeking = true; // PREVENTS CLASH WITH (E3)
            });
            aSeek.addEventListener("change", () => {
                audio.currentTime = aSeek.value;
                if (!audio.paused) {
                    audio.play();
                }
                aSeeking = false;
            });

            // (E3) UPDATE SEEK BAR ON PLAYING
            audio.addEventListener("timeupdate", () => {
                if (!aSeeking) {
                    aSeek.value = Math.floor(audio.currentTime);
                }
            });
        });

        // (F) VOLUME
        aVolume.addEventListener("change", () => {
            audio.volume = aVolume.value;
            aVolIco.innerHTML = (aVolume.value == 0 ? "volume_mute" : "volume_up");
        });

        // (G) ENABLE/DISABLE CONTROLS
        audio.addEventListener("canplay", () => {
            aPlay.disabled = false;
            aVolume.disabled = false;
            aSeek.disabled = false;
        });
        audio.addEventListener("waiting", () => {
            aPlay.disabled = true;
            aVolume.disabled = true;
            aSeek.disabled = true;
        });
    });
</script>


