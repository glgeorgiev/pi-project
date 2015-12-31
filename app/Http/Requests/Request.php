<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Route;

abstract class Request extends FormRequest
{
    protected $idOrEmpty = '';

    protected $modelName = 'change_me';

    public function __construct()
    {
        $param = Route::current()->getParameter($this->modelName);

        if (! is_null($param)) {
            $this->idOrEmpty = ',' . $param->id;
        }

        call_user_func_array(['parent', __FUNCTION__], func_get_args());
    }
}
