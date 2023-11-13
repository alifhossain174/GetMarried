<?php

namespace App\Http\Controllers;
use App\Models\WesbiteThemeColor;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class WesbiteThemeColorController extends Controller
{
    public function websiteThemePage(){
        $data = WesbiteThemeColor::where('id', 1)->first();
        return view('backend.website_theme_color', compact('data'));
    }

    public function updateWebsiteThemeColor(Request $request){

        WesbiteThemeColor::where('id', 1)->update([
            'primary_color' => $request->primary_color,
            'secondary_color' => $request->secondary_color,
            'tertiary_color' => $request->tertiary_color,
            'white_color_1' => $request->white_color_1,
            'white_color_2' => $request->white_color_2,
            'white_color_3' => $request->white_color_3,
            'title_color' => $request->title_color,
            'paragraph_color' => $request->paragraph_color,
            'hints_color' => $request->hints_color,
            'border_color' => $request->border_color,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Website Theme Color Updated', 'Success');
        return back();

    }
}
