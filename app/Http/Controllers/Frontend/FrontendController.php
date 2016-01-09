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
        Carbon::setLocale('bg');
        View::share('menu', Menu::order()->get());
        View::share('sections', Section::with('image')->order()->get());
        View::share('sidebar_poll', Poll::with(['poll_answers', 'poll_answers.poll_votes'])
            ->ordered()->where('show_in_sidebar', true)->first());
        View::share('sidebar_tags', DB::table('article_tag')
            ->select(['tags.id', 'tags.title', 'tags.slug'])
            ->join('tags', 'tags.id', '=', 'article_tag.tag_id')
            ->orderBy('article_tag.updated_at', 'desc')
            ->limit(config('constants.sidebar_tags'))
            ->distinct()->get());
        View::share('most_read_articles', Article::with(['section', 'image'])
            ->where('created_at', '>', Carbon::now()->subMonth())
            ->orderBy('views', 'desc')
            ->limit(config('constants.most_read_articles'))->get());
        View::share('most_liked_articles', Article::with(['section', 'image'])
            ->orderBy('likes', 'desc')
            ->limit(config('constants.most_liked_articles'))->get());
    }
}
