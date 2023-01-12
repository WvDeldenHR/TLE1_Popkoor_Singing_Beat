@extends('layouts.app')
@section('currentPage', 'Afspeellijst Aanmaken')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Maak een nieuwe afspeellijst</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form class="form w-75" method="post" action="{{route('playlists.store')}}" enctype="multipart/form-data">
                @csrf
                {{--                    title--}}
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="title">Titel</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}"
                           required>
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{--                    description--}}
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="description">Beschrijving</label>
                    <input class="form-control" name="description" id="description" type="text"
                           value="{{old('description')}}"
                           required>
                    @error('description')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{--                    songs--}}
                <div class="col-md-4 mb-3">
                    <fieldset class="form-check">
                        @foreach($songs as $song)
                            <input class="form-check-input" type="checkbox" name="songs[]" id="song-{{$song->title}}"
                                   value="{{$song->id}}">
                            <label class="form-check-label" for="song-{{$song->title}}">
                                {{$song->title}} - {{$song->artist}}
                            </label>
                            <br>
                            @error('song-' . $song->title)
                            <span>{{$message}}</span>
                            @enderror
                        @endforeach
                    </fieldset>
                </div>
                {{--                    submit--}}
                <button class="col-md-4 mb-3 btn btn-primary " type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
