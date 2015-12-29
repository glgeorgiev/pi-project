<?php

namespace App;

class PollAnswer extends Model
{
    protected $table = 'poll_answers';

    protected $fillable = ['answer'];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function poll_votes()
    {
        return $this->hasMany(PollVote::class);
    }
}
