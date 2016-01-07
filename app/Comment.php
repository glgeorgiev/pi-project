<?php

namespace App;

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
}
