<?php

namespace App;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['title', 'slug', 'description', 'image_id'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
