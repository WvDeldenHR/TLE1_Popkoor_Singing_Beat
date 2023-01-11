@extends('layouts.layout')
@section('currentPage', 'Nieuw Nummer Aanmaken')
@section('content')
    <section>
        <div class="container | pt-5">
            <a class="btn-size button-primary-alt | fs-400" href="/songs">< Terug naar Repertoire</a>
        </div>

        <div class="container | pt-4">
            <h1 class="fs-700 fw-semi-bold">Nummer Aanmaken</h1>
            <form method="post" action="{{ route('songs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="sgc-box even-column-l-auto | d-grid px-4 py-4">
                    <div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div>
                                <input class="form-control-file form-control sgc-input-btm" name="files[]"
                                       id="filesSongs" type="file" accept="" value="{{old('files')}}" multiple>

                            </div>

                            <div class="d-grid">
                                <label class="fs-500 fw-semi-bold" for="files">Kies Alle Bestanden</label>
                                <sub>(denk aan: Audiobestanden, Albumhoes, Bladmuziek, Koorregie etc.)</sub>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid align-self-center">
                        <div class="even-column-2 | d-grid">
                            <div class="mx-2">
                                <label class="pt-3 pb-2 fs-500 fw-semi-bold" for="title">Titel</label>
                                <input class="sg-input" name="title" id="title" type="text" value="{{old('title')}}">
                            </div>
                            <div class="mx-2">
                                <label class="pt-3 pb-2 fs-500 fw-semi-bold" for="artist">Artist</label>
                                <input class="sg-input" name="artist" id="artist" type="text" value="{{old('artist')}}">
                            </div>
                        </div>
                        <div class="d-grid even-column-2">
                            <div class="mx-2">
                                <label class="pt-3 pb-2 fs-500 fw-semi-bold" for="album">Album</label>
                                <input class="sg-input" name="album" id="album" type="text" value="{{old('album')}}">
                            </div>
                            <div class="mx-2">
                                <label class="pt-3 pb-2 fs-500 fw-semi-bold" for="genre">Genre</label>
                                <select class="form-control sg-select" id="genre" name="genre">
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
                            </div>
                        </div>
                    </div>
                </div>

                <div id="inputField songFiles"></div>
                <div class="d-flex justify-content-end">
                    <button class="button-primary btn-size | mt-3" type="submit">Aanmaken</button>
                </div>
            </form>
        </div>
    </section>
    {{--    succes message--}}
    @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{--    error message--}}
    @if ($errors->any())
        <div class="alert alert-danger d-flex">
            <ul class="mx-auto">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
