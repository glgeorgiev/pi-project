<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.index');
    }
}
