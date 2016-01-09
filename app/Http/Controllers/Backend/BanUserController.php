<?php

namespace App\Http\Controllers\Backend;

use App\BanUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\BanUserRequest;
use App\User;

class BanUserController extends Controller
{
    public function __construct()
    {
        $this->redirectRoute = 'admin.ban_user.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ban_users = BanUser::getFilteredResults();

        $user_list = User::where('is_admin', false)->lists('email', 'id')->toArray();

        return view('backend.pages.ban_user.index', compact('ban_users', 'user_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_list = User::where('is_admin', false)->lists('email', 'id')->toArray();

        return view('backend.pages.ban_user.create', compact('user_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BanUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BanUserRequest $request)
    {
        BanUser::create($request->all());

        return $this->redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BanUser $banUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(BanUser $banUser)
    {
        $banUser->delete();

        return $this->redirect();
    }
}
