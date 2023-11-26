<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userLogin(){
        if(!Auth::user()){
            return view('frontend.auth.login');
        } else {
            return redirect('user/dashboard');
        }

    }

    public function userRegister(){
        return view('frontend.auth.register');
    }
}
