<?php

namespace App;

class BanIp extends Model
{
    protected $table = 'ban_ips';

    protected $fillable = ['ip', 'until'];
}
