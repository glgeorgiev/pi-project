<?php

namespace App\Http\Controllers\Frontend;

use App\Poll;

class PollController extends FrontendController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::with(['poll_answers', 'poll_answers.poll_votes'])
            ->ordered()->paginate(config('constants.per_page'));

        return view('frontend.pages.polls', compact('polls'));
    }
}
