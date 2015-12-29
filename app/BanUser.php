<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanUser extends Model
{
    protected $table = 'ban_users';

    protected $fillable = ['user_id', 'until'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
