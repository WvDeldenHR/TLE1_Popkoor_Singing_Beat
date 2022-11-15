@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{$song->name}} - {{$song->artist}}</h1>
            <h2>{{$song->album}}</h2>
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
        </div>
    </section>
@endsection

