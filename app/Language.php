<?php

namespace App;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['name'];

    public function pages()
    {
        return $this->belongsToMany(Page::class)
            ->withPivot(['title', 'description'])
            ->withTimestamps();
    }
}
