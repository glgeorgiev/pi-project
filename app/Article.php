<?php

namespace App;

use Request;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = ['title', 'slug', 'description', 'content', 'section_id', 'image_id'];

    public function getTagListAttribute()
    {
        return implode(',', $this->tags->lists('title')->toArray());
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * By given array of tags, find or create them
     * and add relationship with the article
     * @param array $tag_titles
     * @return void
     */
    public function saveTags(array $tag_titles)
    {
        $tag_ids = [];
        foreach ($tag_titles as $tag_title) {
            $tag_slug = slugify($tag_title);
            $tag = Tag::where('slug', $tag_slug)->first();
            if (is_null($tag)) {
                $tag = Tag::create([
                    'title' => $tag_title,
                    'slug'  => $tag_slug,
                ]);
            }
            $tag_ids[] = $tag->id;
        }
        $this->tags()->sync($tag_ids);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like', '%' . Request::input('title') . '%');
        }
        if (Request::has('section_id')) {
            $query = $query->where('section_id', Request::input('section_id'));
        }

        return $query->paginate(config('constants.per_page'));
    }
}
