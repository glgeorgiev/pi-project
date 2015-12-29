<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function scopeOrdered($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
