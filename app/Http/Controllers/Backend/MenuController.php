<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.menu.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::getFilteredResults();

        return view('backend.pages.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        Menu::create($request->all());

        return $this->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('backend.pages.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('backend.pages.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuRequest  $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return $this->redirect();
    }
}
