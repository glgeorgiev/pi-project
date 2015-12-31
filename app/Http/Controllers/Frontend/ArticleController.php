<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Section;

class ArticleController extends FrontendController
{
    /**
     * @param string $section_slug
     * @param string $article_slug
     * @return \Illuminate\Http\Response
     */
    public function index($section_slug, $article_slug)
    {
        $section = Section::where('slug', $section_slug)->first();

        if (is_null($section)) {
            return redirect()->route('index');
        }

        $article = Article::where('slug', $article_slug)
            ->where('section_id', $section->id)->first();

        if (is_null($article)) {
            return redirect()->route('index');
        }

        return view('frontend.pages.article', compact('section', 'article'));
    }
}
