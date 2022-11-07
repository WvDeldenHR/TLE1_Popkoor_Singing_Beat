    <section>
        <h1>Publish new post</h1>
        <form method="post" action="/event/store" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title</label>
                <input name="title" id="title"  type="text" value="{{old('title')}}" required>
                @error('title')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="excerpt">Excerpt</label>
                <input name="excerpt" id="excerpt"  type="text" value="{{old('excerpt')}}" required>
                @error('excerpt')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="body">Body</label>
                <input name="body" id="body"  type="text" value="{{old('body')}}" required>
                @error('body')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="thumbnail">Thumbnail</label>
                <input name="thumbnail" id="thumbnail"  type="file" value="{{old('thumbnail')}}">

                <!-- Preview the image-->
{{--                <script>--}}
{{--                    thumbnail.onchange = evt => {--}}
{{--                        const [file] = thumbnail.files--}}
{{--                        if (file) {--}}
{{--                            blah.src = URL.createObjectURL(file)--}}
{{--                        }--}}
{{--                    }--}}
{{--                </script>--}}
            </div>

            <div>
                <input name="active" id="active"  type="text" value="0" required hidden readonly>
                @error('active')
                <p>{{$message}}</p>
                @enderror
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>
