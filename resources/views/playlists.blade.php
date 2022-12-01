@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Playlists</h1>
        </div>
    </section>
    <x-search/>
    <section class="section">
        <div class="container">
            <table class="table w-25">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                @foreach($playlists as $playlist)
                    <tr>
                        <td>{{$playlist->title}}</td>
                        <td>{{$playlist->description}}</td>
                        <td><a href="{{ route('playlists.show', $playlist) }}">Details</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection

