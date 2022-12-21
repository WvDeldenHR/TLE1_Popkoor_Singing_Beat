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
use Illuminate\Validation\Rules\File;
use Maize\Markable\Models\Favorite;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $songs = Song::oldest()->filter(request(['search']))->get()->toArray();
        $favourites = Favorite::all()->toArray();

        foreach ($songs as $key => $song) {
            $songs[$key]['isFavorite'] = false;
            foreach ($favourites as $favourite) {
                if ($favourite['markable_id'] === $song['id'] && $favourite['user_id'] == auth()->user()->id) {
                    $songs[$key]['isFavorite'] = true;
                }
            }
        }

        //if there is a request 'sort' with value of 'Z-A'
        if (\request('sort') == 'Z-A_Title') {
            $key_values = array_column($songs, 'title');
            array_multisort($key_values, SORT_DESC, $songs);
            $currentSort = 'Z-A_Title';

        } else if (\request('sort') == 'Z-A_Artist') {
            $key_values = array_column($songs, 'artist');
            array_multisort($key_values, SORT_DESC, $songs);
            $currentSort = 'Z-A_Artist';

        } else if (\request('sort') == 'A-Z_Artist') {
            $key_values = array_column($songs, 'artist');
            array_multisort($key_values, SORT_ASC, $songs);
            $currentSort = 'A-Z_Artist';

        } else if (\request('sort') == 'Most_Recent') {
            $key_values = array_column($songs, 'created_at');
            array_multisort($key_values, SORT_DESC, $songs);
            $currentSort = 'Most_Recent';
        } else {
            //if there is a request 'sort' with value of 'A-Z' OR there is no request with 'sort'
            //this is the default sorting
            $key_values = array_column($songs, 'title');
            array_multisort($key_values, SORT_ASC, $songs);
            $currentSort = 'A-Z_Title';
        }

        return view('repertoire', [
            'songs' => $songs,
            'currentSort' => $currentSort,
            'favourites' => $favourites
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:songs',
            'artist' => 'required|max:255',
            'album' => 'required|max:255',
            'genre' => 'required|max:255',
            'files' => 'required',
//              'files.*' => 'required|mimes:png,jpg,jpeg,bmp,gif,pdf,mp3,aac,wav|max:20048',
            'file.*' => ['required', File::types(['png', 'jpg', 'jpeg', 'bmp', 'gif', 'pdf', 'mp3', 'aac', 'wav'])->max(20048)]
        ]);

        $song = new Song();
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->album = $request->input('album');
        $song->genre = $request->input('genre');

        foreach ($request->file('files') as $i => $file) {
            //Check if request has e.g. files_0 and it's not null, if this is not the case the file doesn't get stored
            if ($request->has('files_' . $i)) {
                if ($request->input('files_' . $i) !== null) {
                    $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_[' . time() . '].' . $file->getClientOriginalExtension();
                    $pathName = $request->input('files_' . $i);

                    $song->$pathName = $file->storeAs('songFiles', $fileName, 'public');
                }
            }
        }

        if ($request->has('public')) {
            $song->public = 1;
        } else {
            $song->public = 0;
        }

        $song->save();

        return back()->with('status', 'Nummer is succesvol aangemaakt');
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
