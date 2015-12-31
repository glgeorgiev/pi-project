<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    /**
     * @param  string $tag_slug
     * @return \Illuminate\Http\Response
     */
    public function index($tag_slug)
    {
        $tag = Tag::where('slug', $tag_slug)->first();

        if (is_null($tag)) {
            return redirect()->route('index');
        }

        $articles = $tag->articles()->paginate(config('constants.per_page'));

        return view('frontend.pages.article', compact('tag', 'articles'));
    }
}
