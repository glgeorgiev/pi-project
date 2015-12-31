<?php

namespace App;

class Poll extends Model
{
    protected $table = 'polls';

    protected $fillable = ['title', 'description', 'show_in_sidebar'];

    public function poll_answers()
    {
        return $this->hasMany(PollAnswer::class);
    }

    public function poll_votes()
    {
        return $this->hasMany(PollVote::class);
    }
}
