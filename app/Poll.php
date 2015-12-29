<?php

namespace App;

class Poll extends Model
{
    protected $table = 'polls';

    protected $fillable = ['title', 'slug', 'description'];

    public function poll_answers()
    {
        return $this->hasMany(PollAnswer::class);
    }

    public function poll_votes()
    {
        return $this->hasMany(PollVote::class);
    }
}
