<?php

namespace App\Http\Controllers\Backend;

use App\BanIp;
use App\Http\Controllers\Controller;
use App\Http\Requests\BanIpRequest;

class BanIpController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.ban_ip.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ban_ips = BanIp::getFilteredResults();

        return view('backend.pages.ban_ip.index', compact('ban_ips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.ban_ip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BanIpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BanIpRequest $request)
    {
        BanIp::create($request->all());

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BanIp $banUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BanIp $banUser)
    {
        $banUser->delete();

        return $this->redirect();
    }
}
