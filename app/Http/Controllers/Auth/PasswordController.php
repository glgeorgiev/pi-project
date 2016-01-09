<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectPath = '/';
}
