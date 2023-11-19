<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HomepageBioData;
use App\Models\MobileApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\HomepageStatisticsConfig;
use App\Models\HomepageStatistics;
use App\Models\HowItWorksConfig;
use App\Models\HowItWorks;

class FrontendController extends Controller
{

    public function index(){
        $banner = Banner::where('id', 1)->first();
        $homePageBiodata = HomepageBioData::where('id', 1)->first();
        $homePageStatConfig = HomepageStatisticsConfig::where('id', 1)->first();
        $homePageStatistics = HomepageStatistics::orderBy('serial', 'asc')->get();
        $howItWorksConfig = HowItWorksConfig::where('id', 1)->first();
        $howItWorks = HowItWorks::orderBy('serial', 'asc')->get();
        $mobileAppSection = MobileApp::where('id', 1)->first();
        return view('frontend.index', compact('banner', 'homePageBiodata', 'homePageStatConfig', 'homePageStatistics', 'howItWorksConfig', 'howItWorks', 'mobileAppSection'));
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
