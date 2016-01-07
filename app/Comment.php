<?php

namespace App;

use Request;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['comment', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('comment')) {
            $query = $query->where('comment', 'like', '%' . Request::input('comment') . '%');
        }
        if (Request::has('after')) {
            $query = $query->where('created_at', '>', Request::input('after'));
        }
        if (Request::has('before')) {
            $query = $query->where('created_at', '<', Request::input('before'));
        }

        return $query->with(['article', 'user'])->paginate(config('constants.per_page'));
    }
}
