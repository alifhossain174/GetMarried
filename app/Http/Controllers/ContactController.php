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
            'map_iframe_src' => $request->map_iframe_src,
            'map_direction_button_text' => $request->map_direction_button_text,
            'map_direction' => $request->map_direction,
            'contact_form_image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'contact_section_title' => $request->contact_section_title,
            'address_label' => $request->address_label,
            'address' => $request->address,
            'contact_label' => $request->contact_label,
            'primary_contact' => $request->primary_contact,
            'secondary_contact' => $request->secondary_contact,
            'email_label' => $request->email_label,
            'primary_email' => $request->primary_email,
            'secondary_email' => $request->secondary_email,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();

    }
}
