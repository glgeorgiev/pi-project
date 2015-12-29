<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanIp extends Model
{
    protected $table = 'ban_ips';

    protected $fillable = ['ip', 'until'];
}
