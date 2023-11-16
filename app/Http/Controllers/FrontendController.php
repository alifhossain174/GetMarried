<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function privacyPolicy(){
        return view('frontend.privacy_policy');
    }
    
    public function termsCondition(){
        return view('frontend.terms_condition');
    }

    public function refundPolicy(){
        return view('frontend.refund_policy');
    }

    public function langChange(Request $request){
        $locale = App::currentLocale();

        if($locale == 'en'){
            session(['locale' => 'bn']);
        } else {
            session(['locale' => 'en']);
        }

        return back();
    }

}
