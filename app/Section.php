<?php

namespace App;

use Request;

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

    public static function getFilteredResults()
    {
        $query = static::order();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like','%' . Request::input('title') . '%');
        }

        return $query->paginate(config('constants.per_page'));
    }
}
