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

}
