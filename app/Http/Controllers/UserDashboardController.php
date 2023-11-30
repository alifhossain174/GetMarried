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
        return view('frontend.auth.biodata_preview');
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
