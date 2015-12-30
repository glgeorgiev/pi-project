<?php

namespace App;

use Request;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['title', 'url', 'order'];

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
