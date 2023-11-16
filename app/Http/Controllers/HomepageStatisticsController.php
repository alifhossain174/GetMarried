<?php

namespace App\Http\Controllers;

use App\Models\HomepageStatisticsConfig;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class HomepageStatisticsController extends Controller
{
    public function homePageStatisticsConfig(){
        $data = HomepageStatisticsConfig::where('id', 1)->first();
        return view("backend.homepage.statistics_config", compact('data'));
    }

    public function updateHomePageStatisticsConfig(Request $request){
        HomepageStatisticsConfig::where('id', 1)->update([
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'section_title' => $request->section_title,
            'section_title_bn' => $request->section_title_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }
}
