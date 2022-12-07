@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Maak een nieuw nummer aan</h1>
        </div>
    </section>
    <section class="section">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container w-50">
            <form method="post"
                  action="{{ route('songs.store') }}"
                  enctype="multipart/form-data">
                @csrf
                {{-- title --}}
                <div class="mb-3">
                    <label class="form-label" for="title">Titel</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}">
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{-- artist --}}
                <div class="mb-3">
                    <label class="form-label" for="artist">Artist</label>
                    <input class="form-control" name="artist" id="artist" type="text" value="{{old('artist')}}">
                    @error('artist')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{-- album --}}
                <div class="mb-3">
                    <label class="form-label" for="album">Album</label>
                    <input class="form-control" name="album" id="album" type="text" value="{{old('album')}}">
                    @error('album')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{-- genre--}}
                <div class="mb-3">
                    <label class="form-label" for="genre">Genre</label>
                    <select class="form-control form-select" id="genre" name="genre">
                        <option value=""></option>
                        <option value="Ballad">Ballad</option>
                        <option value="Blues">Blues</option>
                        <option value="Dance">Dance</option>
                        <option value="Disco">Disco</option>
                        <option value="Funk">Funk</option>
                        <option value="Pop">Pop</option>
                        <option value="RnB">RnB</option>
                        <option value="Rock">Rock</option>
                        <option value="RockAndRoll">Rock & Roll</option>
                        <option value="Soul">Soul</option>
                    </select>
                    @error('genre')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                {{-- Public or private --}}
                <div class="mb-3">
                    <label for="public">Te vinden op openbare website?</label>
                    <input
                        type="checkbox" id="public" name="public">
                    @error('public')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{-- all files --}}
                <div class="mb-3">
                    <label class="form-label" for="files">Kies Alle Bestanden</label>
                    <sub>(denk aan: Audiobestanden, Albumhoes, Bladmuziek, Koorregie etc.)</sub>
                    <input class="form-control-file form-control" name="files[]" id="filesSongs" type="file"
                           accept="" value="{{old('files')}}" multiple>
                    @error('files')
                    <p>{{$message}}</p>
                    @enderror
                    @error('files.*')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div id="inputField songFiles">
                </div>
                <button class="btn btn-primary mb-2" type="submit">Versturen</button>
            </form>
        </div>
    </section>
@endsection
