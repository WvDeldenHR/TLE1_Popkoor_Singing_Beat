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
            <div class="grid row">
                @foreach($photos as $photo)
                    <img class="col-md" style="display: block; height: 200px; width: 100%; object-fit: contain"  src="/storage/{{$photo->path}}" alt="">
                @endforeach
            </div>
        </div>
    </section>
@endsection

