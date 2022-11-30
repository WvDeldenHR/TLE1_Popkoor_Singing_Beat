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
        return view('repertoire', ['songs' => Song::sortZA()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
//  http://127.0.0.1:8000/song/create
//  only by admin
    public function create()
    {
        return view('songCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request);

        $request->validate([
            'title' => 'required|max:255|unique:songs',
            'artist' => 'required|max:255',
            'album' => 'required|max:255',
            'genre' => 'required|max:255',
            'files' => 'required',
            'files.*' => 'required|mimes:png,jpg,jpeg,bmp,gif,pdf,mp3,aac,wav|max:20048',
        ]);

        $song = new Song();
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->album = $request->input('album');
        $song->genre = $request->input('genre');

        foreach ($request->file('files') as $i => $file) {
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_[' . time() . '].' . $file->getClientOriginalExtension();
            $pathName = $request->input('files_'. $i);
//            dd($fileName);
            $song->$pathName = $file->storeAs('songFiles', $fileName, 'public');
        }

        if ($request->has('public')) {
            $song->public = 1;
        } else {
            $song->public = 0;
        }

        $song->save();

////        todo: validation and security for songs
//        $audiofiles = request()->file('audioFiles');
//        $attributes = request()->all();
//
////        cover art
//        $coverArt = request()->file('cover_art');
//        $coverArtName = pathinfo($coverArt->getClientOriginalName(), PATHINFO_FILENAME) . '_[' . time() . ']';
//        $attributes['cover_art'] = $coverArt->storeAs('cover_arts', $coverArtName, 'public');
//
////        loop through each audio file and store it with its original name
//        foreach ($audiofiles as $i => $audio) {
//            $audioName = pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME) . '_[' . time() . ']';
//            $pathName = 'path_' . $i;
//            $attributes[$pathName] = $audio->storeAs('mp3', $audioName, 'public');
//        }
//
//        Song::create($attributes);
        return back()->with('status', 'Nummer is Succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    //http://127.0.0.1:8000/song/{id}
    public function show($id)
    {
        $song = Song::find($id);
        return view('song', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
