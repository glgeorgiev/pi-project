<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Http\Requests\ArticleRateRequest;
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

        $tags = $article->tags;

        $article->views++;
        $article->save();

        return view('frontend.pages.article',
            compact('section', 'article', 'tags'));
    }

    public function rate(ArticleRateRequest $request)
    {
        $article = Article::find($request->input('article_id'));

        if (is_null($article)) {
            return response()->json([
                'result'    => 'error',
                'message'   => 'Статията не съществува!'
            ], 422);
        }

        $rated_articles = $request->cookie('rated_articles', []);

        if (! is_array($rated_articles)) {
            $rated_articles = [];
        }

        if (in_array($article->id, $rated_articles)) {
            return response()->json([
                'result'    => 'error',
                'message'   => 'Вече сте оценили тази статия!'
            ], 422);
        }
        $rated_articles[] = $article->id;

        if ($request->input('like')) {
            $article->likes++;
        } else {
            $article->dislikes++;
        }
        $article->save();

        //set cookie expire time to one year
        $cookie = cookie('rated_articles', $rated_articles, 525600);

        return response()->json([
            'result'    => 'success',
            'likes'     => $article->likes,
            'dislikes'  => $article->dislikes,
        ])->withCookie($cookie);
    }
}
