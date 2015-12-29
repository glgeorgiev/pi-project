<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.index');
    }
}
