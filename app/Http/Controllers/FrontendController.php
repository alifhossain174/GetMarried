<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BioData;
use App\Models\BiodataType;
use App\Models\BiodataVisitHistory;
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
use Illuminate\Support\Facades\Auth;
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

    public function districtWiseUpazila(Request $request){
        $data = DB::table('upazilas')->where("district_id", $request->permenant_district_id)->get();
        return response()->json($data);
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
        $order = $request->order;

        $data = DB::table('bio_data')
                            ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                            ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                            ->select('bio_data.id', 'bio_data.image', 'bio_data.show_image', 'bio_data.contact_no', 'bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
                            ->where('bio_data.status', 1)
                            ->where('bio_data.delete_request', 0)
                            ->when($biodataType, function($query) use ($biodataType){
                                return $query->where('bio_data.biodata_type_id', $biodataType);
                            })
                            ->when($maritalStatus, function($query) use ($maritalStatus){
                                return $query->where('bio_data.marital_condition_id', $maritalStatus);
                            })
                            ->when($district, function($query) use ($district){
                                return $query->where('bio_data.permenant_district_id', $district);
                            })
                            ->orderBy('bio_data.id', 'desc')
                            ->paginate(12);

        $search_results_url = $request->path()."?".$request->getQueryString();
        session(['call_back_url' => $search_results_url]);

        return view('frontend.search_results', compact('data', 'biodataType', 'maritalStatus', 'district', 'order'));
    }

    public function changeSearchResultOrder(Request $request){

        // common query parameter
        $biodataType = $request->biodata_type;
        $maritalStatus = $request->marital_status;
        $district = $request->district;
        $order = $request->order;
        $upazila = $request->upazila;

        $query = DB::table('bio_data');
        $query->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
        ->select('bio_data.id', 'bio_data.image', 'bio_data.show_image', 'bio_data.contact_no', 'bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
        ->where('bio_data.status', 1)
        ->where('bio_data.delete_request', 0)
        ->when($biodataType, function($query) use ($biodataType){
            return $query->where('bio_data.biodata_type_id', $biodataType);
        })
        ->when($maritalStatus, function($query) use ($maritalStatus){
            return $query->where('bio_data.marital_condition_id', $maritalStatus);
        })
        ->when($district, function($query) use ($district){
            return $query->where('bio_data.permenant_district_id', $district);
        })
        ->when($upazila, function($query) use ($upazila){
            return $query->where('bio_data.permenant_upazila_id', $upazila);
        });

        if($order == 1){
            $query->orderBy('bio_data.id', 'desc');
        } else {
            $query->orderBy('bio_data.id', 'asc');
        }
        $data = $query->paginate(12);

        $search_results_url = $request->path()."?".$request->getQueryString();
        session(['call_back_url' => $search_results_url]);

        return view('frontend.search_results', compact('data', 'biodataType', 'maritalStatus', 'district', 'order'));
    }

    public function filterSearchResults(Request $request){

        // common query parameter
        $biodataType = $request->biodata_type;
        $maritalStatus = $request->marital_status;
        $order = $request->order;
        $district = $request->district;
        $upazila = $request->upazila;
        // common query parameter

        $skinTone = $request->skin_tone;
        $bloodGroup = $request->blood_group;

        // if($request->age){
        //     $ageArray = explode("-", $request->age);
        // }

        $query = DB::table('bio_data');
        $query->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
        ->select('bio_data.id', 'bio_data.image', 'bio_data.show_image', 'bio_data.contact_no', 'bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
        ->where('bio_data.status', 1)
        ->where('bio_data.delete_request', 0)
        ->when($biodataType, function($query) use ($biodataType){
            return $query->where('bio_data.biodata_type_id', $biodataType);
        })
        ->when($maritalStatus, function($query) use ($maritalStatus){
            return $query->where('bio_data.marital_condition_id', $maritalStatus);
        })
        ->when($district, function($query) use ($district){
            return $query->where('bio_data.permenant_district_id', $district);
        })
        ->when($upazila, function($query) use ($upazila){
            return $query->where('bio_data.permenant_upazila_id', $upazila);
        })
        ->when($skinTone, function($query) use ($skinTone){
            return $query->whereIn('bio_data.skin_tone', $skinTone);
        })
        ->when($bloodGroup, function($query) use ($bloodGroup){
            return $query->whereIn('bio_data.blood_group', $bloodGroup);
        });
        // ->when($ageArray, function($query) use ($ageArray){
        //     return $query->whereRaw( 'timestampdiff(year, birth_date, curdate()) between ? and ?', $ageArray);
        // });
        if($order == 1){
            $query->orderBy('bio_data.id', 'desc');
        } else {
            $query->orderBy('bio_data.id', 'asc');
        }
        $data = $query->paginate(12);

        $search_results_url = $request->path()."?".$request->getQueryString();
        session(['call_back_url' => $search_results_url]);

        return view('frontend.search_results', compact('data', 'biodataType', 'maritalStatus', 'district', 'upazila', 'order', 'skinTone', 'bloodGroup'));
    }

    public function removeSearchFilters(Request $request){
        $biodataType = '';
        $maritalStatus = '';
        $district = '';
        $order = 1;

        $data = DB::table('bio_data')
                            ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                            ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                            ->select('bio_data.id', 'bio_data.image', 'bio_data.show_image', 'bio_data.contact_no', 'bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
                            ->where('bio_data.status', 1)
                            ->where('bio_data.delete_request', 0)
                            ->when($biodataType, function($query) use ($biodataType){
                                return $query->where('bio_data.biodata_type_id', $biodataType);
                            })
                            ->when($maritalStatus, function($query) use ($maritalStatus){
                                return $query->where('bio_data.marital_condition_id', $maritalStatus);
                            })
                            ->when($district, function($query) use ($district){
                                return $query->where('bio_data.permenant_district_id', $district);
                            })
                            ->orderBy('bio_data.id', 'desc')
                            ->paginate(12);

        $search_results_url = $request->path()."?".$request->getQueryString();
        session(['call_back_url' => $search_results_url]);

        return view('frontend.search_results', compact('data', 'biodataType', 'maritalStatus', 'district', 'order'));
    }

    public function searchBiodataNo(Request $request){

        $biodata_no = $request->biodata_no;

        $data = DB::table('bio_data')
                            ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                            ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                            ->select('bio_data.id', 'bio_data.image', 'bio_data.show_image', 'bio_data.contact_no', 'bio_data.biodata_type_id', 'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.height_foot', 'bio_data.height_inch', 'bio_data.skin_tone', 'bio_data.slug', 'marital_conditions.title', 'marital_conditions.title_bn', 'districts.name as district_name', 'districts.bn_name as district_name_bn')
                            ->where('bio_data.status', 1)
                            ->where('bio_data.delete_request', 0)
                            ->where('bio_data.biodata_no', 'LIKE', '%'.$biodata_no.'%')
                            ->orderBy('bio_data.id', 'desc')
                            ->paginate(12);

        $search_results_url = $request->path()."?".$request->getQueryString();
        session(['call_back_url' => $search_results_url]);

        return view('frontend.search_results', compact('data', 'biodata_no'));
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        } else {
            $bname = 'Android-WebView';
            $ub = "Android-WebView";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version = isset($matches['version'][0]) ? $matches['version'][0] : 1;
            }
            else {
                $version = isset($matches['version'][1]) ? $matches['version'][1] : 1;
            }
        }
        else {
            $version= isset($matches['version'][0]) ? $matches['version'][0] : 1;
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }

    public function getOS() {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform =   "Bilinmeyen İşletim Sistemi";
        $os_array =   array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ( $os_array as $regex => $value ) {
            if ( preg_match($regex, $user_agent ) ) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }


    public function biodataDetails(Request $request, $slug){

        $biodata_details_url = $request->path();
        session(['call_back_url' => $biodata_details_url]);

        $biodata = DB::table('bio_data')
                ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn')
                ->where('bio_data.slug', $slug)
                ->first();

        BioData::where('id', $biodata->id)->increment('views');

        $ua = $this->getBrowser();
        $yourbrowser = $ua['name'];
        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

        BiodataVisitHistory::insert([
            'biodata_id' => $biodata->id,
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'from_ip_address' => $this->get_client_ip(),
            'browser' => $yourbrowser,
            'os' => $this->getOS(),
            'device' => $isMob ? 'Mobile' : 'Desktop',
            'created_at' => Carbon::now()
        ]);

        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.biodata_details', compact('biodata', 'questionSets'));
    }

}
