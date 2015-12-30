<?php

namespace App;

use Request;

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

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like','%' . Request::input('title') . '%');
        }

        return $query->paginate(config('constants.per_page'));
    }
}
