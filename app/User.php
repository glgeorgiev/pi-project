<?php

namespace App;

use DateTime;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Request;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        return $this->is_admin ? true : false;
    }

    public function isBanned()
    {
        $now = new DateTime();

        $banned = BanUser::where('user_id', $this->getAttribute('id'))->where(function($q) use($now) {
            $q->whereNull('until')
                ->orWhere('until', '>', $now);
        })->first();

        if ($banned instanceof BanUser) {
            return true;
        }

        $banned = BanIp::where('ip', Request::getClientIp())->where(function($q) use($now) {
            $q->whereNull('until')
                ->orWhere('until', '>', $now);
        })->first();

        if ($banned instanceof BanUser) {
            return true;
        }

        return false;
    }
}
