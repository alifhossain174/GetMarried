<?php

namespace App\Http\Controllers;

use App\Models\CustomCssJs;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomCssJsController extends Controller
{
    public function customCssJsPage(){
        $data = CustomCssJs::where('id', 1)->first();
        return view('backend.custom_css_js', compact('data'));
    }

    public function updateCustomCssJs(Request $request){
        CustomCssJs::where('id', 1)->update([
            'custom_css' => $request->custom_css,
            'custom_js' => $request->custom_js,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }
}
