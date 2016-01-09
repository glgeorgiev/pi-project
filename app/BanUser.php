<?php

namespace App;

use Request;

class BanUser extends Model
{
    protected $table = 'ban_users';

    protected $fillable = ['user_id', 'until'];

    protected $dates = ['until'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('user_id', Request::input('user_id'));
        }

        return $query->with('user')->paginate(config('constants.per_page'));
    }
}
