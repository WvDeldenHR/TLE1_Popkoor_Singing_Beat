<section>
    <h1>Publish new post</h1>
    <form method="post" action="/song/store" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name</label>
            <input name="name" id="name"  type="text" value="{{old('name')}}" required>
            @error('name')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="artist">artist</label>
            <input name="artist" id="artist"  type="text" value="{{old('artist')}}" required>
            @error('artist')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="album">album</label>
            <input name="album" id="album"  type="text" value="{{old('album')}}" required>
            @error('album')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="song_text">song_text</label>
            <input name="song_text" id="song_text"  type="text" value="{{old('song_text')}}" required>
            @error('song_text')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="song_text_dutch">song_text_dutch</label>
            <input name="song_text_dutch" id="song_text_dutch"  type="text" value="{{old('song_text_dutch')}}" required>
            @error('song_text_dutch')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="cover_art">cover_art</label>
            <input name="cover_art" id="cover_art" type="file" value="{{old('cover_art')}}" required>
            @error('cover_art')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path">path</label>
            <input name="path" id="path"  type="file" accept=".mp3, audio/*" value="{{old('path')}}" required>
            @error('path')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path_instrumental">path_instrumental</label>
            <input name="path_instrumental" id="path_instrumental"  type="file" accept=".mp3, audio/*" value="{{old('path_instrumental')}}" required>
            @error('path_instrumental')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path_contralto">path_contralto</label>
            <input name="path_contralto" id="path_contralto"  type="file" accept=".mp3, audio/*" value="{{old('path_contralto')}}" required>
            @error('path_contralto')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path_soprano">Name</label>
            <input name="path_soprano" id="path_soprano"  type="file" accept=".mp3, audio/*" value="{{old('path_soprano')}}" required>
            @error('path_soprano')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path_tenor">path_tenor</label>
            <input name="path_tenor" id="path_tenor"  type="file" accept=".mp3, audio/*" value="{{old('path_tenor')}}" required>
            @error('path_tenor')
            <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="path_bass">path_bass</label>
            <input name="path_bass" id="path_bass"  type="file" accept=".mp3, audio/*" value="{{old('path_bass')}}" required>
            @error('path_bass')
            <p>{{$message}}</p>
            @enderror
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
