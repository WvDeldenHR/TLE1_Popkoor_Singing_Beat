@extends('layouts.app')
@section('currentPage', '- Nieuw Bericht')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Plaats nieuw bericht</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <form class="form w-75" method="post" action="{{route('events.store')}}" enctype="multipart/form-data">
                @csrf
                {{--                    title--}}
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}" required>
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="excerpt">Excerpt</label>
                    <input class="form-control" name="excerpt" id="excerpt" type="text" value="{{old('excerpt')}}"
                           required>
                    @error('excerpt')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{--                    body--}}
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="body">Body</label>
                    <input class="form-control" name="body" id="body" type="text" value="{{old('body')}}" required>
                    @error('body')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{--                    thumbnail--}}
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="thumbnail">Thumbnail</label>
                    <input name="thumbnail" id="thumbnail" type="file" value="{{old('thumbnail')}}">
                </div>
                {{--                    active--}}
                <div class="col-md-4 mb-3">
                    <input name="active" id="active" type="text" value="0" required hidden readonly>
                    @error('active')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                {{--                    submits--}}
                <button class="col-md-4 mb-3 btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
