<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\ProfileRequest;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Validator;

class AuthController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins, AuthenticatesAndRegistersUsers {
        AuthenticatesAndRegistersUsers::postRegister    as traitPostRegister;
        AuthenticatesAndRegistersUsers::postLogin       as traitPostLogin;
    }

    protected $redirectPath = '/';
    protected $redirectRoute = 'index';

    public function postRegister(Request $request)
    {
        $this->traitPostRegister($request);

        if ($request->has('redirect_url')) {
            return redirect($request->input('redirect_url'));
        }

        return $this->redirect();
    }

    public function postLogin(Request $request)
    {
        $response = $this->traitPostLogin($request);

        if (Auth::check() && $request->has('redirect_url')) {
            return redirect($request->input('redirect_url'));
        }

        return $response;
    }

    public function getProfile()
    {
        return view('auth.profile');
    }

    public function postProfile(ProfileRequest $request)
    {
        Auth::user()->update($request->all());

        if ($request->has('redirect_url')) {
            return redirect($request->input('redirect_url'));
        }

        return $this->redirect();
    }

    public function getLogout()
    {
        Auth::logout();

        if (request()->has('redirect_url')) {
            return redirect(request()->input('redirect_url'));
        }

        return $this->redirect();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
