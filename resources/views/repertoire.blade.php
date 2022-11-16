@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Repertoire</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <table class="table w-25">
                <tr>
                    <th>Cover</th>
                    <th>Name</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Details</th>
                </tr>
                @foreach($songs as $song)
                    <tr>
                        <td>
                            <img class="img-thumbnail" src="{{asset('storage/' . $song->cover_art)}}"
                                 alt="cover art {{$song->name}}">
                        </td>
                        <td>{{$song->name}}</td>
                        <td>{{$song->artist}}</td>
                        <td>{{$song->album}}</td>
                        <td><a href="{{ route('songs.show', $song) }}">Details</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection

