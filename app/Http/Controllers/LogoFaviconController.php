<?php

namespace App\Http\Controllers;

use App\Models\LogoFavicon;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LogoFaviconController extends Controller
{
    public function logoFaviconPage(){
        $data = LogoFavicon::where('id', 1)->first();
        return view('backend.logo_favicon', compact('data'));
    }

    public function updateLogoFavicon(Request $request){

        $request->validate([
            'logo' => ['required', 'string'],
        ]);

        LogoFavicon::where('id', 1)->update([
            'tab_title' => $request->tab_title,
            'logo' => $request->logo != '' ? parse_url($request->logo)['path'] : null,
            'favicon' => $request->favicon != '' ? parse_url($request->favicon)['path'] : null,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }
}
