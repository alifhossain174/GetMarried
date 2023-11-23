<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('frontend.auth.edit_biodata');
    }
    public function userCreateReport(){
        return view('frontend.auth.create_report');
    }


}
