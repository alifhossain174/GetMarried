<?php

namespace App\Http\Controllers;
use App\Models\SocialMediaLinks;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class SocialMediaLinksController extends Controller
{
    public function socialMediaPage(){
        $data = SocialMediaLinks::where('id', 1)->first();
        return view('backend.social_media', compact('data'));
    }

    public function updateSocialMediaLinks(Request $request){

        SocialMediaLinks::where('id', 1)->update([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'messenger' => $request->messenger,
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Social Media Links Updated', 'Success');
        return back();

    }
}
