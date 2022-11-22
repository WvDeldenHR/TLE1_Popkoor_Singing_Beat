<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoAlbum;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('photoAlbum');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
        //Validate incoming request
        $request->validate([
            'title' => 'required|max:255|unique:albums',
            'description' => 'required|max:1000',
            'photos' => 'required',
            'photos.*' => 'required|mimes:png,jpg,jpeg,bmp|max:20048',
        ]);
        //create an album
        $photoAlbum = new PhotoAlbum();
        $photoAlbum->title = $request->input('title');
        $photoAlbum->description = $request->input('description');
        $photoAlbum->save();

        // loop through each photo and save it in the album
        foreach ($request->file('photos') as $photoRequest) {
            $photo = new Photo();
            $photoName = $photoRequest->hashName();
            $photo->path = $photoRequest->storeAs('photos', $photoName, 'public');
            $photo->album_id = $photoAlbum->id;
            $photo->save();
        }

        return redirect()->route('photo.create')->with('status', 'Album is Succesvol aangemaakt');

        //        Base for when adding custom validation messages
//        This is to avoid the user seeing messages like: "Photos.0 dient een bestand te zijn van het type: png, jpg, jpeg, bmp."
//        $request->validate([
//            'title' => 'required|max:255',
//            'description' => 'required|max:1000',
//            'photos' => 'required',
//            'photos.*' => 'required|mimes:png,jpg,jpeg,bmp|max:20048',
//        ],
//            [
//                'title.required' => 'Het veld Titel is verplicht.',
//                'description.required' => 'Het veld Beschrijving is verplicht.'
//            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
