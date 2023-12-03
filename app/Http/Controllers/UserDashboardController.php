<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use App\Models\BiodataType;
use App\Models\MaritalCondition;
use App\Models\QuestionSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function userDashboard(){
        return view('frontend.auth.dashboard');
    }
    public function userSettings(){
        return view('frontend.auth.settings');
    }
    public function userShortList(){
        return view('frontend.auth.short_list');
    }
    public function userIgnoreList(){
        return view('frontend.auth.ignore_list');
    }
    public function userMyPurchased(){
        return view('frontend.auth.my_purchased');
    }
    public function userConnection(){
        return view('frontend.auth.connection');
    }
    public function userPaymentProcess(){
        return view('frontend.auth.payment_process');
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


}
