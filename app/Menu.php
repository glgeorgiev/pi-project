<?php

namespace App;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['title', 'url', 'order'];
}
