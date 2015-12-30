<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    protected $idOrEmpty = '';

    protected $modelName = 'change_me';

    public function __construct()
    {
        if ($this->route()->hasParameter($this->modelName)) {
            $this->idOrEmpty = ',' . $this->route()->getParameter($this->modelName)->id;
        }

        call_user_func_array(['parent', __FUNCTION__], func_get_args());
    }
}
