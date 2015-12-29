<?php

namespace App;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['title', 'description', 'content', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
