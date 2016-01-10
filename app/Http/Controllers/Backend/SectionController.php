<?php

namespace App\Http\Controllers\Backend;

use App\Section;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use DB;
use Illuminate\Http\Request;

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
        $sections = Section::order()->get();

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

        DB::table('sections')->update([
            'order' => DB::raw('ELT(FIELD(`id`, ' . implode(',', $orderIds) . '),
                                ' . implode(',', $orderNumbers) . ')'),
        ]);

        return response()->json(['result' => 'success']);
    }
}
