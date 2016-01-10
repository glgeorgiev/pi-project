<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use DB;
use Illuminate\Http\Request;

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
        $menus = Menu::order()->get();

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

    public function order(Request $request)
    {
        if (! $request->has('order') || ! is_array($request->input('order'))) {
            return response()->json([
                'result'    => 'error',
                'message'   => 'Something really odd has happened',
            ], 422);
        }

        $orderArray = $request->input('order');
        $orderNumbers = array_keys($orderArray);
        $orderIds = array_values($orderArray);
        //we don't want the order to start from 0,
        //we want it to start from 1,
        //also make sure everyone is an integer
        foreach ($orderNumbers as $key => $val) {
            $orderNumbers[$key] = intval($val + 1);
        }
        //make sure everyone is an integer
        foreach ($orderIds as $key => $val) {
            $orderIds[$key] = intval($val);
        }

        DB::table('menus')->update([
            'order' => DB::raw('ELT(FIELD(`id`, ' . implode(',', $orderIds) . '),
                                ' . implode(',', $orderNumbers) . ')'),
        ]);

        return response()->json(['result' => 'success']);
    }
}
