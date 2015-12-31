<?php

namespace App\Http\Controllers\Frontend;

class IndexController extends FrontendController
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.index');
    }
}
