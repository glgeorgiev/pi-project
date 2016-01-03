<?php

namespace App\Http\Controllers\Frontend;

use App\Article;

class IndexController extends FrontendController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['section', 'image', 'user', 'tags'])
            ->ordered()->limit(config('constants.index_page_articles'))
            ->get();

        return view('frontend.pages.index', compact($articles));
    }
}
