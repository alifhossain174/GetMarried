<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function homePageBanner(){
        $data = Banner::where('id', 1)->first();
        return view('backend.homepage.banner', compact('data'));
    }

    public function updateHomePageBanner(Request $request){

        $request->validate([
            'background_image' => ['required', 'string'],
        ]);

        Banner::where('id', 1)->update([
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'banner_title' => $request->banner_title,
            'banner_title_bn' => $request->banner_title_bn,
            'banner_description' => $request->banner_description,
            'banner_description_bn' => $request->banner_description_bn,
            'priority' => $request->priority,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }
}
