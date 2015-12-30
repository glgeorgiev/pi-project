<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Section;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.article.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::ordered()->paginate(config('constants.per_page'));

        return view('backend.pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section_list = Section::lists('title', 'id');

        return view('backend.pages.article.create', compact('section_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());

        $article->saveTags(explode(',', $request->input('tag_list')));

        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backend.pages.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $section_list = Section::lists('title', 'id');

        return view('backend.pages.article.edit', compact('article', 'section_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        $article->saveTags(explode(',', $request->input('tag_list')));

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return $this->redirect();
    }
}
