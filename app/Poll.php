<?php

namespace App;

use Request;

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

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like','%' . Request::input('title') . '%');
        }

        return $query->with('poll_answers')->paginate(config('constants.per_page'));
    }
}
