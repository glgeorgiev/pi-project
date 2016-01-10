<?php

namespace App;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = ['title', 'slug', 'description', 'image_id', 'order'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
