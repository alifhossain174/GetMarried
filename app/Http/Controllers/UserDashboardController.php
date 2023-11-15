<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function userDashboard(Request $request){
        return view('frontend.auth.dashboard');
    }
    public function userSettings(Request $request){
        return view('frontend.auth.settings');
    }
}
