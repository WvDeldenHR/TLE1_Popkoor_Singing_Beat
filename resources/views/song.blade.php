@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{$song->title}} - {{$song->artist}}</h1>
            <h2>{{$song->album}} - {{$song->genre}}</h2>
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
{{--Mogelijke Stijlen voor muziek speler (of in iedergeval de classes--}}
{{--        <style>--}}
{{--            /* (A) MATERIAL ICONS */--}}
{{--            .material-icons {--}}
{{--                font-size: 28px;--}}
{{--                color: #efff6a;--}}
{{--            }--}}

{{--            /* (B) WRAPPER */--}}
{{--            #aWrap {--}}
{{--                font-family: arial, sans-serif;--}}
{{--                display: flex;--}}
{{--                flex-wrap: wrap;--}}
{{--                align-items: center;--}}
{{--                box-sizing: border-box;--}}
{{--                max-width: 500px;--}}
{{--                padding: 10px;--}}
{{--                border-radius: 10px;--}}
{{--                background: #484848;--}}
{{--            }--}}

{{--            /* (C) PLAY/PAUSE BUTTON */--}}
{{--            #aPlay {--}}
{{--                padding: 0;--}}
{{--                margin: 0;--}}
{{--                background: 0;--}}
{{--                border: 0;--}}
{{--                cursor: pointer;--}}
{{--            }--}}

{{--            /* (D) TIME */--}}
{{--            #aCron {--}}
{{--                font-size: 14px;--}}
{{--                color: #cbcbcb;--}}
{{--                margin: 0 10px;--}}
{{--            }--}}

{{--            /* (E) RANGE SLIDERS */--}}
{{--            /* (E1) HIDE DEFAULT */--}}
{{--            #aWrap input[type="range"] {--}}
{{--                box-sizing: border-box;--}}
{{--                appearance: none;--}}
{{--                border: none;--}}
{{--                outline: none;--}}
{{--                box-shadow: none;--}}
{{--                width: 150px;--}}
{{--                padding: 0;--}}
{{--                margin: 0;--}}
{{--                background: 0;--}}
{{--            }--}}

{{--            #aWrap input[type="range"]::-webkit-slider-thumb {--}}
{{--                appearance: none;--}}
{{--            }--}}

{{--            /* (E2) CUSTOM SLIDER TRACK */--}}
{{--            #aWrap input[type=range]::-webkit-slider-runnable-track {--}}
{{--                background: #626262;--}}
{{--            }--}}

{{--            #aWrap input[type=range]::-moz-range-track {--}}
{{--                background: #626262;--}}
{{--            }--}}

{{--            /* (E3) CUSTOM SLIDER BUTTON */--}}
{{--            #aWrap input[type=range]::-webkit-slider-thumb {--}}
{{--                width: 16px;--}}
{{--                height: 16px;--}}
{{--                border-radius: 50%;--}}
{{--                border: 0;--}}
{{--                background: #fff;--}}
{{--            }--}}

{{--            #aWrap input[type=range]::-moz-range-thumb {--}}
{{--                width: 16px;--}}
{{--                height: 16px;--}}
{{--                border-radius: 50%;--}}
{{--                border: 0;--}}
{{--                background: #fff;--}}
{{--            }--}}

{{--            /* (F) VOLUME */--}}
{{--            #aVolIco {--}}
{{--                margin: 0 10px;--}}
{{--            }--}}

{{--            /* (G) PLAYLIST */--}}
{{--            #aList {--}}
{{--                width: 100%;--}}
{{--                padding: 10px;--}}
{{--                margin: 10px;--}}
{{--                color: #7e7e7e;--}}
{{--                background: #323232;--}}
{{--            }--}}

{{--            .aRow {--}}
{{--                cursor: pointer;--}}
{{--                padding: 10px 0;--}}
{{--            }--}}

{{--            .aRow.now {--}}
{{--                color: #fea;--}}
{{--            }--}}

{{--        </style>--}}


<script>
    let playlist = [
        {name: "Alle Stempartijen", src: "{{asset('storage/' . $song->path_track)}}"},
        {name: "Instrumental", src: "{{asset('storage/' . $song->path_track_instrumental)}}"},
        {name: "Alleen Hoog", src: "{{asset('storage/' . $song->path_track_soprano_1)}}"},
        {name: "Alleen Midden hoog", src: "{{asset('storage/' . $song->path_track_contralto_1)}}"},
        {name: "Alleen Tenor", src: "{{asset('storage/' . $song->path_track_tenor_1)}}"},
        {name: "Alleen Bas", src: "{{asset('storage/' . $song->path_track_bass_1)}}"}
    ];
</script>


