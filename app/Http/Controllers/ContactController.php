<?php

namespace App\Http\Controllers;

use App\Models\ContactConfig;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function contactUsPage(){
        $data = ContactConfig::where('id', 1)->first();
        return view("backend.contact_us", compact('data'));
    }

    public function updateContactUsPage(Request $request){

        ContactConfig::where('id', 1)->update([
            'page_title' => $request->page_title,
            'page_title_bn' => $request->page_title_bn,
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'google_map_link' => $request->google_map_link,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();

    }
}
