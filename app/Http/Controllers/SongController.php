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
        return view('repertoire', [Song::All()]);

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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $all_files = request()->file('all_files');

//        $attributes = request()->validate([
//            'name' => 'required',
//            'artist' => 'required',
//            'album' => 'required',
//            'song_text' => 'required',
//            'song_text_dutch' => 'required',
//            'cover_art' => 'required',
//            'path_0' => 'required',
//            'path_1' => 'required',
//            'path_2' => 'required',
//            'path_3' => 'required',
//            'path_4' => 'required',
//            'path_5' => 'required',
//            'active' => 'required',
//        ]);

        $attributes = request()->all();

        $attributes['cover_art'] = request()->file('cover_art')->store('thumbnails', 'public');

        foreach ($all_files as $i => $file) {
            $path_name = 'path_' . $i;
            $attributes[$path_name] = $file->store('mp3', 'public');
            echo $path_name;
        }
        Song::create($attributes);
        return redirect('/repertoire');
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
        $song = Song::with($id);
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
