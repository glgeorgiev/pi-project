<?php

namespace App\Http\Controllers\Frontend;

use App\Section;

class SectionController extends FrontendController
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

        $articles = $section->articles()->with(['section', 'image', 'user', 'tags'])
            ->ordered()->paginate(config('constants.per_page'));

        return view('frontend.pages.section', compact('section', 'articles'));
    }
}
