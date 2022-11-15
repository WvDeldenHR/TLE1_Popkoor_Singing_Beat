<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    //http://127.0.0.1:8000/repertoire
    public function index()
    {
        return view('repertoire');
//        return view('repertoire', [Song::All()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//http://127.0.0.1:8000/song/create
//only by admin
    public function create()
    {
        return view('songCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(request()->all());
        $attributes = request()->validate([
            'name' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'song_text' => 'required',
            'song_text_dutch' => 'required',
            'cover_art' => 'required',
            'path' => 'required',
            'path_instrumental' => 'required',
            'path_contralto' => 'required',
            'path_soprano' => 'required',
            'path_tenor' => 'required',
            'path_bass' => 'required',
            'active' => 'required',
        ]);

        $attributes['cover_art'] = request()->file('cover_art')->store('thumbnails');
        $attributes['path'] = request()->file('path')->store('mp3');
        $attributes['path_instrumental'] = request()->file('path_instrumental')->store('mp3');
        $attributes['path_contralto'] = request()->file('path_contralto')->store('mp3');
        $attributes['path_soprano'] = request()->file('path_soprano')->store('mp3');
        $attributes['path_tenor'] = request()->file('path_tenor')->store('mp3');
        $attributes['path_bass'] = request()->file('path_bass')->store('mp3');

        Song::create($attributes);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    //http://127.0.0.1:8000/song/{id}
    public function show($id)
    {
        $song = Song::with($id);
        return view('song', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
