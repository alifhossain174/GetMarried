<?php

namespace App\Http\Controllers;

use App\Models\MobileApp;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MobileAppController extends Controller
{
    public function mobileAppSection(){
        $data = MobileApp::where('id', 1)->first();
        return view('backend.homepage.mobile_app', compact('data'));
    }

    public function updateMobileAppSection(Request $request){
        MobileApp::where('id', 1)->update([
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'description' => $request->description,
            'description_bn' => $request->description_bn,
            'play_store_link' => $request->play_store_link,
            'app_store_link' => $request->app_store_link,
            'background_color' => $request->background_color,
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'priority' => $request->priority,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();

    }
}
