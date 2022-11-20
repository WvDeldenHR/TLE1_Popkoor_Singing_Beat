@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Maak nieuw Fotoalbum</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Oeps!</strong> Er is iets mis gegaan bij het aanmaken van dit fotoalbum.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" method="post" action="{{route('photo.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Titel</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Beschrijving</label>
                    <textarea class="form-control" name="description" id="description"
                              type="text">{{old('description')}}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="photos">Foto's</label>
                    <input name="photos[]" id="photos" type="file" value="{{old('photos')}}" multiple>
                </div>

                <button class="btn btn-primary mb-2" type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
