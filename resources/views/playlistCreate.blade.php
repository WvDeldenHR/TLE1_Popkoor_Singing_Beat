@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Maak een nieuwe playlist</h1>
        </div>
    </section>
    <section class="section">
        <div class="container w-50">
            <form method="post" action="{{ route('playlists.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
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
                    <div class="mb-3">
                        <fieldset class="form-check">
                            @foreach($songs as $song)
                                <input class="form-check-input" type="checkbox" name="songs[]" id="song-{{$song->name}}"
                                       value="{{$song->id}}">
                                <label class="form-check-label" for="song-{{$song->name}}">
                                    {{$song->name}} - {{$song->artist}}
                                </label>
                                <br>
                                @error('song-' . $song->name)
                                <span>{{$message}}</span>
                                @enderror
                            @endforeach
                        </fieldset>
                    </div>
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
