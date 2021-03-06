<?php

namespace App\Http\Controllers\Backend;

use App\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.image.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::getFilteredResults();

        if (request()->ajax()) {
            return view('backend.pages.image._search_results', compact('images'));
        }

        return view('backend.pages.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $image = Image::create($request->all());

        if ($request->ajax()) {
            return response()->json([
                'result'        => 'OK',
                'message'       => 'Created an image',
                'image_id'      => $image->id,
                'image_title'   => $image->title,
                'image_url'     => $image->url,
            ]);
        }

        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('backend.pages.image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('backend.pages.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ImageRequest  $request
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->all());

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return $this->redirect();
    }
}
