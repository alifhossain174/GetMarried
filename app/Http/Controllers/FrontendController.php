<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\FaqConfig;
use App\Models\Faq;
use App\Models\HomepageBioData;
use App\Models\MobileApp;
use App\Models\PrivacyPolicy;
use App\Models\RefundPolicy;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\HomepageStatisticsConfig;
use App\Models\HomepageStatistics;
use App\Models\HowItWorksConfig;
use App\Models\HowItWorks;
use App\Models\AboutUsConfig;
use App\Models\AboutUs;
use App\Models\ContactConfig;
use App\Models\ContactRequest;
use App\Models\InstructionConfig;
use App\Models\Instruction;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

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
        $aboutUsConfig = AboutUsConfig::where('id', 1)->first();
        $aboutUs = AboutUs::where('id', 1)->first();
        return view('frontend.about', compact('aboutUsConfig', 'aboutUs'));
    }

    public function faq(){
        $faqConfig = FaqConfig::where('id', 1)->first();
        $faqs = Faq::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.faq', compact('faqConfig', 'faqs'));
    }

    public function direction(){
        $instructionConfig = InstructionConfig::where('id', 1)->first();
        $instructions = Instruction::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.direction', compact('instructionConfig', 'instructions'));
    }

    public function contact(){
        $contactConfig = ContactConfig::where('id', 1)->first();
        return view('frontend.contact', compact('contactConfig'));
    }

    public function privacyPolicy(){
        $data = PrivacyPolicy::where('id', 1)->first();
        return view('frontend.privacy_policy', compact('data'));
    }

    public function termsCondition(){
        $data = TermsCondition::where('id', 1)->first();
        return view('frontend.terms_condition', compact('data'));
    }

    public function refundPolicy(){
        $data = RefundPolicy::where('id', 1)->first();
        return view('frontend.refund_policy', compact('data'));
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

    public function contactRequestSubmit(Request $request){

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required'],
        ];

        $this->validate($request, $rules, [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'subject.required' => 'Subject is Required',
            'message.required' => 'Message is Required'
        ]);


        ContactRequest::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'slug' => time().str::random(5),
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Request Submitted', 'Success');
        return back();
    }

    public function searchResults(){
        return view('frontend.search_results');
    }

}
