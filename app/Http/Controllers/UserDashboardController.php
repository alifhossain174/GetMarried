<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use App\Models\BiodataQuestionAnswer;
use App\Models\BiodataType;
use App\Models\BiodataVisitHistory;
use App\Models\PaidView;
use App\Models\PaymentHistory;
use App\Models\SavedBiodata;
use App\Models\User;
use App\Models\MaritalCondition;
use App\Models\PaymentGateway;
use App\Models\PricingPackage;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\QuestionSet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function userDashboard(){
        $likedBiodatas = SavedBiodata::where('user_id', Auth::user()->id)->where('status', 1)->count();
        $dislikedBiodatas = SavedBiodata::where('user_id', Auth::user()->id)->where('status', 2)->count();
        $totalPayments = PaymentHistory::where('user_id', Auth::user()->id)->count();
        $preferred = DB::table('saved_biodatas')
                    ->leftJoin('bio_data', 'saved_biodatas.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'bio_data.user_id', 'users.id')
                    ->where('bio_data.user_id', Auth::user()->id)
                    ->where('saved_biodatas.status', 1)
                    ->count();
        $totalVisits = BiodataVisitHistory::where('user_id', Auth::user()->id)->count();
        $todaysVisits = BiodataVisitHistory::where('user_id', Auth::user()->id)->where('created_at', 'LIKE', date("Y-m-d").'%')->count();
        $lastWeekVisits = BiodataVisitHistory::where('user_id', Auth::user()->id)->whereBetween('created_at', [date("Y-m-d", strtotime("-7 days"))." 00:00:00", date("Y-m-d")." 23:59:59"])->count();
        $lastMonthVisits = BiodataVisitHistory::where('user_id', Auth::user()->id)->whereBetween('created_at', [date("Y-m-d", strtotime("-30 days"))." 00:00:00", date("Y-m-d")." 23:59:59"])->count();

        return view('frontend.auth.dashboard', compact('likedBiodatas', 'dislikedBiodatas', 'totalPayments',
        'preferred', 'totalVisits', 'todaysVisits', 'lastWeekVisits', 'lastMonthVisits'));
    }
    public function userSettings(){
        return view('frontend.auth.settings');
    }

    public function userPasswordChange(Request $request){

        $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8'],
        ]);

        if($request->password != $request->confirm_password){
            Toastr::error('Password & Confirm Password have to be same', 'Missmatch Found !');
            return back();
        }

        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Successfully Changed the Password', 'Password Changed !');
        return back();
    }

    public function userBiodataRemove(Request $request){
        $request->validate([
            'check' => ['required'],
        ]);

        $biodataInfo = BioData::where('user_id', Auth::user()->id)->first();
        if(!$biodataInfo){
            Toastr::error("You Haven't Submitted the Biodata", 'Biodata Not Found !');
            return back();
        } else {
            BiodataQuestionAnswer::where('user_id', Auth::user()->id)->where('biodata_id', $biodataInfo->id)->delete();
            if($biodataInfo->image && file_exists(public_path($biodataInfo->image))){
                unlink(public_path($biodataInfo->image));
            }
            $biodataInfo->delete();
            Toastr::success('Successfully Deleted the Biodata', 'Biodata Deleted !');
            return back();
        }
    }
    public function userShortList(){

        $data = DB::table('saved_biodatas')
                    ->leftJoin('bio_data', 'saved_biodatas.biodata_id', 'bio_data.id')
                    ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                    ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                    ->select('saved_biodatas.status', 'saved_biodatas.user_id', 'saved_biodatas.slug', 'bio_data.biodata_no',
                    'bio_data.birth_date', 'bio_data.slug as biodata_slug', 'districts.name as district_name',
                    'upazilas.name as upazila_name', 'bio_data.permenant_address')
                    ->where('saved_biodatas.user_id', Auth::user()->id)
                    ->where('saved_biodatas.status', 1)
                    ->orderBy('saved_biodatas.id', 'desc')
                    ->paginate(10);

        return view('frontend.auth.short_list', compact('data'));
    }

    public function removeLikedBiodata($slug){
        SavedBiodata::where('slug', $slug)->delete();
        Toastr::error('Removed From Liked List');
        return back();
    }
    public function userIgnoreList(){

        $data = DB::table('saved_biodatas')
                ->leftJoin('bio_data', 'saved_biodatas.biodata_id', 'bio_data.id')
                ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                ->select('saved_biodatas.status', 'saved_biodatas.user_id', 'saved_biodatas.slug',
                'bio_data.biodata_no', 'bio_data.birth_date', 'bio_data.slug as biodata_slug', 'districts.name as district_name',
                'upazilas.name as upazila_name', 'bio_data.permenant_address')
                ->where('saved_biodatas.user_id', Auth::user()->id)
                ->where('saved_biodatas.status', 2)
                ->orderBy('saved_biodatas.id', 'desc')
                ->paginate(10);

        return view('frontend.auth.ignore_list', compact('data'));
    }

    public function userMyPurchased(){
        $data = DB::table('payment_histories')
                    ->join('pricing_packages', 'payment_histories.package_id', 'pricing_packages.id')
                    ->select('payment_histories.*', 'pricing_packages.title', 'pricing_packages.title_bn')
                    ->where('payment_histories.user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('frontend.auth.my_purchased', compact('data'));
    }

    public function userConnection(){
        $pricingPackages = PricingPackage::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.auth.connection', compact('pricingPackages'));
    }
    public function userPaymentProcess($slug){
        $package = PricingPackage::where('slug', $slug)->first();
        $paymentGateways = PaymentGateway::where('status', 1)->get();
        return view('frontend.auth.payment_process', compact('package', 'paymentGateways'));
    }
    public function userCheckedBiodata(){
        return view('frontend.auth.checked_biodata');
    }
    public function userSupportReport(){
        return view('frontend.auth.support_report');
    }
    public function userReportConversation(){
        return view('frontend.auth.report_conversation');
    }
    public function userBiodataPreview(){

        $biodata = DB::table('bio_data')
                        ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                        ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                        ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                        ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                        ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                        ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                        ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn',)
                        ->where('user_id', Auth::user()->id)
                        ->first();

        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.auth.biodata_preview', compact('biodata', 'questionSets'));
    }
    public function userEditBiodata(){
        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        $biodataTypes = BiodataType::where('status', 1)->orderBy('serial', 'asc')->get();
        $maritalConditions = MaritalCondition::where('status', 1)->orderBy('serial', 'asc')->get();
        $nationalities = DB::table('countries')->get();
        $districts = DB::table('districts')->get();
        $biodata = BioData::where('user_id', Auth::user()->id)->first();
        return view('frontend.auth.edit_biodata', compact('questionSets', 'biodataTypes', 'maritalConditions', 'nationalities', 'districts', 'biodata'));
    }

    public function userCreateReport(){
        return view('frontend.auth.create_report');
    }

    public function purchaseConnection(Request $request){
        $packageInfo = PricingPackage::where('id', $request->pricing_package_id)->first();
        $paymentGateway = DB::table('payment_gateways')->where('id', $request->payment_gateway[0])->select('payment_gateways.provider_name', 'payment_gateways.id')->first();
        if($paymentGateway->provider_name == 'ssl_commerz'){
            return redirect('sslcommerz/order/payment/'.$packageInfo->id);
        } else {
            Toastr::error('Only SSL Commerz is Available', 'Failed');
            return back();
        }
    }

    public function addToLikedList($slug){
        $biodataInfo = Biodata::where('slug', $slug)->first();
        $alreadySaved = SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodataInfo->id], ['status', 1]])->first();
        if($alreadySaved){
            Toastr::warning('Already Added in Liked List', 'Already Added');
            return redirect(session('call_back_url'));
        }else {
            SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodataInfo->id], ['status', 2]])->delete();
            SavedBiodata::insert([
                'user_id' => Auth::user()->id,
                'biodata_id' => $biodataInfo->id,
                'status' => 1,
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Added to the Liked List', 'Liked');
            return redirect(session('call_back_url'));
        }

    }

    public function addToDislikedList($slug){
        $biodataInfo = Biodata::where('slug', $slug)->first();
        $alreadySaved = SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodataInfo->id], ['status', 2]])->first();
        if($alreadySaved){
            Toastr::warning('Already Added in Disliked List', 'Already Added');
            return redirect(session('call_back_url'));
        }else {
            SavedBiodata::where([['user_id', Auth::user()->id], ['biodata_id', $biodataInfo->id], ['status', 1]])->delete();
            SavedBiodata::insert([
                'user_id' => Auth::user()->id,
                'biodata_id' => $biodataInfo->id,
                'status' => 2,
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Added to the Disliked List', 'Liked');
            return redirect(session('call_back_url'));
        }

    }

    public function viewBiodataContactInfo($slug){
        $userInfo = User::where('id', Auth::user()->id)->first();
        if($userInfo->connections <= 0){
            Toastr::error('You have to Purchase Connection', 'Not Enough Balance !');
            return redirect(session('call_back_url'));
        } else {
            $biodataInfo = Biodata::where('slug', $slug)->first();
            PaidView::insert([
                'user_id' => $userInfo->id,
                'biodata_id' => $biodataInfo->id,
                'created_at' => Carbon::now()
            ]);
            Toastr::success('You have spent 1 Connection', 'Details Showing in Contact');
            return redirect(session('call_back_url'));
        }

    }


}
