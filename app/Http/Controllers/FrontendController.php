<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GoogleRecaptcha;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function index(){
        return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function direction(){
        return view('frontend.direction');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function userLogin(){
        return view('frontend.auth.login');
    }

    public function userRegister(){
        return view('frontend.auth.register');
    }

}
