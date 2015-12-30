<?php

namespace App;

use App\Helpers\UploadImage;

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
}
