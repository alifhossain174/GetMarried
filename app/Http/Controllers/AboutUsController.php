<?php

namespace App\Http\Controllers;

use App\Models\AboutUsConfig;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class AboutUsController extends Controller
{
    public function aboutUsPageTitle(){
        $data = AboutUsConfig::where('id', 1)->first();
        return view('backend.about_us.page_title', compact('data'));
    }

    public function updateAboutUsPageTitle(Request $request){
        AboutUsConfig::where('id', 1)->update([
            'page_title' => $request->page_title,
            'page_title_bn' => $request->page_title_bn,
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function aboutUsPage(){
        $data = AboutUs::where('id', 1)->first();
        return view('backend.about_us.about', compact('data'));
    }

    public function updateAboutUs(Request $request){

        AboutUs::where('id', 1)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'description' => $request->description,
            'description_bn' => $request->description_bn,
        ]);

        if($request->image != ''){
            $data = AboutUs::where('id', 1)->first();

            $oldFiles = [];
            if($data->images != '' && $data->images != null){
                foreach(json_decode($data->images) as $img){
                    $oldFiles[] = $img;
                }
            }

            $imageName = parse_url($request->image)['path'];
            array_unshift($oldFiles, $imageName);

            AboutUs::where('id', 1)->update([
                'images' => json_encode($oldFiles),
            ]);
        }

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function deleteSliderImage($index){
        $data = AboutUs::where('id', 1)->first();
        $oldFiles = [];
        if($data->images != '' && $data->images != null){
            foreach(json_decode($data->images) as $img){
                $oldFiles[] = $img;
            }
        }

        unset($oldFiles[$index]);
        AboutUs::where('id', 1)->update([
            'images' => json_encode(array_values($oldFiles)),
        ]);

        Toastr::error('Data has been Deleted', 'Success');
        return back();
    }
}
