@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Publish new post</h1>
        </div>
    </section>
    <section class="section">
        <div class="container w-50">
            <form method="post" action="{{ route('songs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
{{--                    name--}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" name="name" id="name" type="text" value="{{old('name')}}" required>
                        @error('name')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
{{--                    artist--}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="artist">Artist</label>
                        <input class="form-control" name="artist" id="artist" type="text" value="{{old('artist')}}"
                               required>
                        @error('artist')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
{{--                    album--}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="album">Album</label>
                        <input class="form-control" name="album" id="album" type="text" value="{{old('album')}}"
                               required>
                        @error('album')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
{{--                    lyrics--}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="song_text">Lyrics</label>
                        <textarea class="form-control" name="song_text" id="song_text" type="text"
                                  value="{{old('song_text')}}"
                                  required
                                  maxlength="255"></textarea>
                        @error('song_text')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
{{--                    lyrics dutch--}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="song_text_dutch">Lyrics vertaald</label>
                        <textarea class="form-control" name="song_text_dutch" id="song_text_dutch" type="text"
                                  value="{{old('song_text_dutch')}}"
                                  required
                                  maxlength="255"></textarea>
                        @error('song_text_dutch')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
{{--                cover art--}}
                <div class="mb-3">
                    <label class="form-label" for="cover_art">Cover art</label>
                    <input class="form-control-file form-control" name="cover_art" id="cover_art" type="file"
                           value="{{old('cover_art')}}" accept="" required>
                    @error('cover_art')
                    <p>{{$message}}</p>
                    @enderror
                </div>
{{--                audio files--}}
                <div class="mb-3">
                    <label class="form-label" for="all_files">Drop audio files</label>
                    <input class="form-control-file form-control" name="audioFiles[]" id="audioFiles" type="file"
                           accept="" value="{{old('audioFiles')}}" multiple required>
                    @error('audioFiles')
                    <p>{{$message}}</p>
                    @enderror
                </div>
{{--                hidden tag (maybe redundant?)--}}
                <div class="mb-3">
                    <input name="active" id="active" type="text" value="0" required hidden readonly>
                    @error('active')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mb-2" type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
