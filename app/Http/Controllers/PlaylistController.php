<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use App\Models\Song;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $playlists = Playlist::latest()->filter(request(['search']))->get();

        //if there is a request 'sort' with value of 'Z-A'
        if (\request('sort') == 'Z-A') {
            return view('playlists', [
                'playlists' => $playlists->sortByDesc('title')
            ]);
        } else {
            //if there is a request 'sort' with value of 'A-Z' OR there is no request with 'sort'
            //this is the default sorting
            return view('playlists', [
                'playlists' => $playlists->sortBy('title')
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
        return view('playlistCreate', [
            'songs' => Song::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:title',
            'description' => 'required|max:1000',
        ]);

        //create a playlist
        $playlist = new Playlist();
        $playlist->title = $request->input('title');
        $playlist->description = $request->input('description');
        $playlist->save();

        foreach ($request->songs as $song) {
            $playlist->songs()->attach($song);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $playlist = Playlist::find($id);
        return view('playlist', compact('playlist'));
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
}