@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Publish new post</h1>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <form class="form" method="post" action=" {{ route('events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{old('title')}}" required>
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="excerpt">Excerpt</label>
                    <input class="form-control" name="excerpt" id="excerpt" type="text" value="{{old('excerpt')}}"
                           required>
                    @error('excerpt')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="body">Body</label>
                    <input class="form-control" name="body" id="body" type="text" value="{{old('body')}}" required>
                    @error('body')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="thumbnail">Thumbnail</label>
                    <input name="thumbnail" id="thumbnail" type="file" value="{{old('thumbnail')}}">
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
