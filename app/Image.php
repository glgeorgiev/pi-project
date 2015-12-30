<?php

namespace App;

use App\Helpers\UploadImage;
use Request;

class Image extends Model
{
    use UploadImage;

    protected $table = 'images';

    protected $fillable = ['title', 'ext'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like', Request::input('title'));
        }

        return $query->paginate(config('constants.per_page'));
    }
}
