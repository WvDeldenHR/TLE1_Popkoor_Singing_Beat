@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Photo Albums</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <ul class="list-group">
                @foreach($photoAlbums as $photoAlbum)
                    <li class="list-group-item">
                        <a href="{{ route('PhotoAlbums.show', $photoAlbum->id) }}">{{$photoAlbum->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <h2>Recente foto's</h2>
            <div class="grid row">
                @foreach($photos as $photo)
                    <img class="col-md" style="display: block; height: 200px; width: 100%; object-fit: contain"  src="/storage/{{$photo->path}}" alt="">
                @endforeach
            </div>
        </div>
    </section>
@endsection

