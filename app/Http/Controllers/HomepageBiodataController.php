<?php

namespace App\Http\Controllers;

use App\Models\HomepageBioData;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomepageBiodataController extends Controller
{
    public function homePageBiodata(){
        $data = HomepageBioData::where('id', 1)->first();
        return view('backend.homepage.biodata', compact('data'));
    }

    public function updateHomePageBiodata(Request $request){

        $request->validate([
            'image' => ['required', 'string'],
        ]);

        HomepageBioData::where('id', 1)->update([
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'description' => $request->description,
            'description_bn' => $request->description_bn,
            'button1_text' => $request->button1_text,
            'button1_text_bn' => $request->button1_text_bn,
            'button1_url' => $request->button1_url,
            'button2_text' => $request->button2_text,
            'button2_text_bn' => $request->button2_text_bn,
            'button2_url' => $request->button2_url,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }
}
