<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Poll;

class PollsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::with(['poll_answers', 'poll_votes'])
            ->ordered()->paginate(config('constants.per_page'));

        return view('frontend.pages.polls', compact('polls'));
    }
}
