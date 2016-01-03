<?php

namespace App\Http\Controllers\Frontend;

use App\Tag;

class TagController extends FrontendController
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

        $articles = $tag->articles()->with(['section', 'image', 'user', 'tags'])
            ->ordered()->paginate(config('constants.per_page'));

        return view('frontend.pages.article', compact('tag', 'articles'));
    }
}
