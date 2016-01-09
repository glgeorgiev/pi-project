<?php

namespace App\Http\Controllers\Backend;

use App\Poll;
use App\Http\Controllers\Controller;
use App\Http\Requests\PollRequest;
use DateTime;
use DB;

class PollController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.poll.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::getFilteredResults();

        return view('backend.pages.poll.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PollRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollRequest $request)
    {
        $poll = Poll::create($request->all());

        $now = new DateTime();
        $answer_data = [];
        foreach ($request->input('poll_answers') as $answer) {
            $answer_data[] = [
                'answer'    => $answer,
                'poll_id'   => $poll->id,
                'created_at'=> $now,
                'updated_at'=> $now,
            ];
        }
        DB::table('poll_answers')->insert($answer_data);

        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        return view('backend.pages.poll.show', compact('poll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        return view('backend.pages.poll.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PollRequest  $request
     * @param  Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function update(PollRequest $request, Poll $poll)
    {
        $poll->update($request->all());

        $ids     = array_keys($request->input('poll_answers'));
        $answers = array_values($request->input('poll_answers'));
        DB::table('poll_answers')->update([
            'answer'    => DB::raw('ELT(FIELD(`id`, ' . implode(',', $ids) . '),
                                \'' . implode('\',\'', $answers) . '\')'),
            'updated_at'=> new DateTime(),
        ]);

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->poll_answers()->delete();

        $poll->delete();

        return $this->redirect();
    }
}
