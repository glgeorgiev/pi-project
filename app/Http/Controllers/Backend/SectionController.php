<?php

namespace App\Http\Controllers\Backend;

use App\Section;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.section.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::getFilteredResults();

        return view('backend.pages.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        Section::create($request->all());

        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  Section $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('backend.pages.section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Section $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('backend.pages.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SectionRequest  $request
     * @param  Section $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->all());

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Section $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return $this->redirect();
    }
}
