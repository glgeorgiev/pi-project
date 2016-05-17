<?php

namespace App;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['name'];

    public function languages()
    {
        return $this->belongsToMany(Language::class)
            ->withPivot(['title', 'description'])
            ->withTimestamps();
    }
}
