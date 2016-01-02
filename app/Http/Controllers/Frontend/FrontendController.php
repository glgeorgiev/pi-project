<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Poll;
use App\Section;
use Carbon\Carbon;
use DB;
use View;

class FrontendController extends Controller
{
    public function __construct()
    {
        View::share('menu', Menu::order()->get());
        View::share('sections', Section::order()->get());
        View::share('poll', Poll::with(['poll_answers', 'poll_answers.poll_votes'])
            ->ordered()->where('show_in_sidebar', true)->first());
        View::share('sidebar_tags', DB::statement(
            'SELECT DISTINCT article_tag.tag_id AS id,
                                     tags.title AS title,
                                     tags.slug  AS slug
             FROM article_tag JOIN tags ON tags.id = article_tag.tag_id
             ORDER BY article_tag.updated_at LIMIT :limit',
            ['limit' => config('constants.sidebar_tags')]));
        View::share('most_read_articles', Article::with('section')
            ->where('created_at', '>', Carbon::now()->subMonth())
            ->orderBy('views', 'desc')
            ->limit(config('constants.most_read_articles'))->get());
        View::share('most_liked_articles', Article::with('section')
            ->orderBy('likes', 'desc')
            ->limit(config('constants.most_liked_articles'))->get());
    }
}
