@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>{{$photoAlbum->title}}</h1>
            <p>{{$photoAlbum->description}}</p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="grid">
                @foreach($photos as $photo)
                    <img class="w-25 col-md" src="/storage/{{$photo->path}}" alt="Foto in {{$photoAlbum->title}}">
                @endforeach
            </div>
        </div>
    </section>
@endsection

