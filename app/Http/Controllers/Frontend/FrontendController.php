<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Poll;
use App\Section;
use View;

class FrontendController extends Controller
{
    public function __construct()
    {
        View::share('menu', Menu::order()->get());
        View::share('sections', Section::order()->get());
        View::share('poll', Poll::with(['poll_answers', 'poll_answers.poll_votes'])
            ->ordered()->where('show_in_sidebar', true)->first());
    }
}
