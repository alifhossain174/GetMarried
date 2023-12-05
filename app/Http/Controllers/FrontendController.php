<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BioData;
use App\Models\BiodataType;
use App\Models\FaqConfig;
use App\Models\Faq;
use App\Models\HomepageBioData;
use App\Models\MaritalCondition;
use App\Models\MobileApp;
use App\Models\PrivacyPolicy;
use App\Models\QuestionSet;
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
use Illuminate\Support\Facades\DB;

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
        $biodataTypes = BiodataType::where('status', 1)->orderBy('serial', 'asc')->get();
        $maritalConditions = MaritalCondition::where('status', 1)->orderBy('serial', 'asc')->get();
        $districts = DB::table('districts')->orderBy('id', 'asc')->get();
        return view('frontend.index', compact('banner', 'homePageBiodata', 'homePageStatConfig', 'homePageStatistics', 'howItWorksConfig', 'howItWorks', 'mobileAppSection', 'biodataTypes', 'maritalConditions', 'districts'));
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

    public function searchResults(Request $request){

        $biodataType = $request->biodata_type;
        $maritalStatus = $request->marital_status;
        $district = $request->district;

        $data = DB::table('bio_data')
                            ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                            ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                            ->select('bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
                            ->where('bio_data.status', 1)
                            ->when($biodataType, function($query) use ($biodataType){
                                return $query->where('bio_data.biodata_type_id', $biodataType);
                            })
                            ->when($maritalStatus, function($query) use ($maritalStatus){
                                return $query->where('bio_data.marital_condition_id', $maritalStatus);
                            })
                            ->when($district, function($query) use ($district){
                                return $query->where('bio_data.marital_condition_id', $district);
                            })
                            ->orderBy('bio_data.id', 'desc')
                            ->paginate(12);

        return view('frontend.search_results', compact('data'));
    }

    public function biodataDetails($slug){

        $biodata = DB::table('bio_data')
                ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn',)
                ->where('bio_data.slug', $slug)
                ->first();

        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.biodata_details', compact('biodata', 'questionSets'));
    }

}
