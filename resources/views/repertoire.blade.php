@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <h1>Repertoire</h1>
        </div>
    </section>
    <x-search/>
    <section class="section">
        <div class="container">
            <a class="link-primary" href="{{route('favourites')}}">Favourites</a>
            <table class="table w-25">
                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Name</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Genre</th>
                    <th>Details</th>
                    <th></th>
                </tr>
                @foreach($songs as $key => $song)
                    {{--                    @dd(($favourites->has($song['id'], auth()->user()->id)));--}}
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>
                            <img class="img-thumbnail" src="{{asset('storage/' . $song['path_cover_art'])}}"
                                 alt="Albumhoes {{$song['title']}}">
                        </td>
                        <td>{{$song['title']}}</td>
                        <td>{{$song['artist']}}</td>
                        <td>{{$song['album']}}</td>
                        <td>{{$song['genre']}}</td>
                        <td><a href="{{ route('songs.show', $song['id']) }}">Details</a></td>
                        <td>
                            <form action="{{ route('song.favourite', $song['id']) }}" method="post">
                                @csrf
                                <button class="btn
                                @if($song['isFavorite'])
                                    btn-warning
                                @else
                                    btn-light
                                @endif
                                    mb-2" type="submit">
                                    <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                                         xmlns:xlink='http://www.w3.org/1999/xlink'>
                                        <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                                        <g transform="matrix(0.7 0 0 0.7 12 12)">
                                            <path
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                                transform=" translate(-16, -15.77)"
                                                d="M 16 2.125 L 15.09375 4.1875 L 11.84375 11.46875 L 3.90625 12.3125 L 1.65625 12.5625 L 3.34375 14.0625 L 9.25 19.40625 L 7.59375 27.21875 L 7.125 29.40625 L 9.09375 28.28125 L 16 24.28125 L 22.90625 28.28125 L 24.875 29.40625 L 24.40625 27.21875 L 22.75 19.40625 L 28.65625 14.0625 L 30.34375 12.5625 L 28.09375 12.3125 L 20.15625 11.46875 L 16.90625 4.1875 Z M 16 7.03125 L 18.5625 12.8125 L 18.8125 13.34375 L 19.375 13.40625 L 25.65625 14.0625 L 20.96875 18.28125 L 20.53125 18.6875 L 20.65625 19.25 L 21.96875 25.40625 L 16.5 22.28125 L 16 21.96875 L 15.5 22.28125 L 10.03125 25.40625 L 11.34375 19.25 L 11.46875 18.6875 L 11.03125 18.28125 L 6.34375 14.0625 L 12.625 13.40625 L 13.1875 13.34375 L 13.4375 12.8125 Z"
                                                stroke-linecap="round"/>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection


