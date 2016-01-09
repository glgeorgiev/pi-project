<?php

namespace App\Http\Controllers\Frontend;

use App\Poll;
use App\PollVote;
use DB;
use Illuminate\Http\Request;

class PollController extends FrontendController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::with(['poll_answers', 'poll_answers.poll_votes'])
            ->ordered()->paginate(config('constants.polls_per_page'));

        return view('frontend.pages.polls', compact('polls'));
    }

    public function vote(Request $request)
    {
        if (! $request->has('answer')) {
            return response()->json([
                'result'    => 'ERROR',
                'message'   => 'Моля изберете отговор!',
            ], 400);
        }

        $poll = Poll::find($request->input('poll_id'));

        if (is_null($poll)) {
            return response()->json([
                'result'    => 'ERROR',
                'message'   => 'Анкетата не беше намерена!',
            ], 400);
        }

        $poll_answers = $poll->poll_answers;

        $found = false;
        foreach ($poll_answers as $poll_answer) {
            if ($poll_answer->id == $request->input('answer')) {
                $found = true;
                break;
            }
        }

        if (! $found) {
            return response()->json([
                'result'    => 'ERROR',
                'message'   => 'Избраният отговор не беше намерен!',
            ], 400);
        }

        $ip = ip2long($request->getClientIp());

        $votes_from_ip = PollVote::where('poll_id', $poll->id)->where('ip', $ip)->count();

        if ($votes_from_ip < config('constants.max_votes_from_ip')) {
            PollVote::create([
                'ip'            => $ip,
                'poll_id'       => $poll->id,
                'poll_answer_id'=> $poll_answer->id,
            ]);
        } else {
            $too_many_votes = true;
        }

        $poll_votes = PollVote::select([
            DB::raw('COUNT(id) AS count'),
            'poll_answer_id',
        ])->where('poll_id', $poll->id)
            ->groupBy('poll_answer_id')
            ->lists('count', 'poll_answer_id');

        return view('frontend.partials.poll_votes',
            compact('poll', 'poll_votes', 'poll_answers', 'too_many_votes'));
    }
}
