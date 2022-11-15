@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Repertoire</h1>
        </div>
    </section>
    <section class="section">
        @foreach($songs as $song)
            <div class="container">
                <h2>{{$song->name}}</h2>
                <p>{{$song->album}}</p>
                <p>{{$song->song_text}}</p>
                <p>{{$song->song_text_dutch}}</p>
                <img class="w-25" src="{{asset('storage/' . $song->cover_art)}}" alt="cover art {{$song->name}}">
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
            </div>
        @endforeach
    </section>
    {{--    <a href="{{route(route('song.show', $song->id))}}">song link</a>--}}
@endsection

