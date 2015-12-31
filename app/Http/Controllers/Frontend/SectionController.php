<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Section;

class SectionController extends Controller
{
    /**
     * @param string $section_slug
     * @return \Illuminate\Http\Response
     */
    public function index($section_slug)
    {
        $section = Section::where('slug', $section_slug)->first();

        if (is_null($section)) {
            return redirect()->route('index');
        }

        $articles = $section->articles()->paginate(config('constants.per_page'));

        return view('frontend.pages.article', compact('section', 'articles'));
    }
}
