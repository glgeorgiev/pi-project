<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::ordered()
            ->limit(config('constants.dashboard_records'))
            ->with(['section', 'image', 'user'])
            ->get();

        $comments = Comment::ordered()
            ->limit(config('constants.dashboard_records'))
            ->with(['user', 'article'])
            ->get();

        return view('backend.pages.index',
            compact('articles', 'comments'));
    }
}
