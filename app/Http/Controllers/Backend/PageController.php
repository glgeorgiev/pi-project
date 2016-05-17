<?php

namespace App\Http\Controllers\Backend;

use App\Language;
use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.page.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('backend.pages.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::create($request->all());

        return $this->redirect();
    }

    public function edit(Page $page)
    {
        $languages = Language::all();

        $form_data = [];
        foreach ($page->languages as $language) {
            $form_data[$language->id] = $language;
        }

        return view('backend.pages.page.edit', compact('page', 'languages', 'form_data'));
    }

    public function update(Page $page, Request $request)
    {
        $page->update($request->all());

        $page->languages()->sync($request->input('sync_data') ? : []);

        return $this->redirect();
    }
}
