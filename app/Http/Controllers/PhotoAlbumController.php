<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoAlbum;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PhotoAlbumController extends Controller
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
        return view('photoAlbums', [
            'photoAlbums' => PhotoAlbum::latest()->get()->sortByDesc('id'),
            'photos' => Photo::all()->sortByDesc('id')->skip(0)->take(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('photoAlbumCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $photoAlbum = PhotoAlbum::find($id);
        $photos = $photoAlbum->photos;
//        dd($photos);
        return view('photoAlbum', compact('photoAlbum', 'photos'));
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
