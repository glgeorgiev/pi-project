<?php

namespace App;

use Request;

class BanIp extends Model
{
    protected $table = 'ban_ips';

    protected $fillable = ['ip', 'until'];

    protected $dates = ['until'];

    public function setIpAttribute($ip)
    {
        $this->attributes['ip'] = ip2long($ip);
    }

    public function getIpAttribute()
    {
        return long2ip($this->attributes['ip']);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('ip', ip2long(Request::input('ip')));
        }

        return $query->paginate(config('constants.per_page'));
    }
}
