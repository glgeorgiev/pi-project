<?php

namespace App;

class PollVote extends Model
{
    protected $table = 'poll_votes';

    protected $fillable = ['ip', 'poll_id', 'poll_answer_id'];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function poll_answer()
    {
        return $this->belongsTo(PollAnswer::class);
    }
}
