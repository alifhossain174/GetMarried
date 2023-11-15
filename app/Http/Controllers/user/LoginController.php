<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function userLogin(){
        return view('frontend.auth.login');
    }

    public function userRegister(){
        return view('frontend.auth.register');
    }
}
