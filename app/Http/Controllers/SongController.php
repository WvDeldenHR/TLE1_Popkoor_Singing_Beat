<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maize\Markable\Models\Favorite;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $songs = Song::latest()->filter(request(['search']))->get();
        $favourites = Favorite::all();

        //if there is a request 'sort' with value of 'Z-A'
        if (\request('sort') == 'Z-A') {
            return view('repertoire', [
                'songs' => $songs->sortByDesc('name'),
                'favourites' => $favourites
            ]);
        } else {
            //if there is a request 'sort' with value of 'A-Z' OR there is no request with 'sort'
            //this is the default sorting
            return view('repertoire', [
                'songs' => $songs->sortBy('name'),
                'favourites' => $favourites
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('songCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return RedirectResponse
     */
    public function store()
    {
//        todo: validation and security for songs
        $audiofiles = request()->file('audioFiles');
        $attributes = request()->all();

//        cover art
        $coverArt = request()->file('cover_art');
        $coverArtName = pathinfo($coverArt->getClientOriginalName(), PATHINFO_FILENAME) . '[' . time() . ']';
        $attributes['cover_art'] = $coverArt->storeAs('cover_arts', $coverArtName, 'public');

//        loop through each audio file and store it with its original name
        foreach ($audiofiles as $i => $audio) {
            $audioName = pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME) . '[' . time() . ']';
            $pathName = 'path_' . $i;
            $attributes[$pathName] = $audio->storeAs('mp3', $audioName, 'public');
        }

        Song::create($attributes);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $song = Song::find($id);
        return view('song', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function favourite($id)
    {
        Favorite::toggle(Song::find($id), Auth::user());
        return redirect()->back();
    }

    public function showFavourites()
    {

        //if there is a request 'sort' with value of 'Z-A'
        if (\request('sort') == 'Z-A') {
            return view('favourites', [
                'songs' => Song::latest()->filter(request(['search']))->get()->sortByDesc('name')
            ]);
        } else {
            //if there is a request 'sort' with value of 'A-Z' OR there is no request with 'sort'
            //this is the default sorting
            return view('favourites', [
                'songs' => Song::latest()->filter(request(['search']))->get()->sortBy('name')
            ]);
        }
    }
}
