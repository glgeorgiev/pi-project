<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $redirectRoute = 'index';

    public function redirect()
    {
        if (request()->ajax()) {
            return response()->json(['result' => 'OK']);
        }
        return redirect()->route($this->redirectRoute);
    }
}
