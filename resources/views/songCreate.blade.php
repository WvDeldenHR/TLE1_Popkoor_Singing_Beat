@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Publish new post</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <form method="post" action="/song/store" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" name="name" id="name" type="text" value="{{old('name')}}" required>
                        @error('name')
                        <p>{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="artist">Artist</label>
                        <input class="form-control" name="artist" id="artist" type="text" value="{{old('artist')}}"
                               required>
                        @error('artist')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
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
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="song_text">Lyrics</label>
                        <input class="form-control" name="song_text" id="song_text" type="text"
                               value="{{old('song_text')}}"
                               required>
                        @error('song_text')
                        <p>{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="song_text_dutch">Lyrics vertaald</label>
                        <input class="form-control" name="song_text_dutch" id="song_text_dutch" type="text"
                               value="{{old('song_text_dutch')}}"
                               required>
                        @error('song_text_dutch')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="cover_art">Cover art</label>
                    <input class="custom-file-input d-block" name="cover_art" id="cover_art" type="file"
                           value="{{old('cover_art')}}" required>
                    @error('cover_art')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path">Audio volledig</label>
                    <input class="custom-file-input d-block" name="path" id="path" type="file" accept=".mp3, audio/*"
                           value="{{old('path')}}" required>
                    @error('path')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path_instrumental">Audio instrumentale</label>
                    <input class="form-control-file d-block" name="path_instrumental" id="path_instrumental" type="file"
                           accept=".mp3, audio/*"
                           value="{{old('path_instrumental')}}" required>
                    @error('path_instrumental')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path_contralto">Audio contralto</label>
                    <input class="form-control-file d-block" name="path_contralto" id="path_contralto" type="file"
                           accept=".mp3, audio/*"
                           value="{{old('path_contralto')}}" required>
                    @error('path_contralto')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path_soprano">Audio soprano</label>
                    <input class="form-control-file d-block" name="path_soprano" id="path_soprano" type="file"
                           accept=".mp3, audio/*"
                           value="{{old('path_soprano')}}" required>
                    @error('path_soprano')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path_tenor">Audio tenor</label>
                    <input class="form-control-file d-block" name="path_tenor" id="path_tenor" type="file"
                           accept=".mp3, audio/*"
                           value="{{old('path_tenor')}}" required>
                    @error('path_tenor')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="path_bass">Audio bass</label>
                    <input class="form-control-file d-block" name="path_bass" id="path_bass" type="file"
                           accept=".mp3, audio/*"
                           value="{{old('path_bass')}}"
                           required>
                    @error('path_bass')
                    <p>{{$message}}</p>
                    @enderror
                </div>
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
