<?php

namespace App\Http\Controllers;
use App\Models\WebsiteLanguage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConfigController extends Controller
{

    public function languagePage(){
        $languages = WebsiteLanguage::orderBy('serial', 'asc')->get();
        return view('backend.language', compact('languages'));
    }

    public function setDefaultLanguage($languageCode, $value){
        WebsiteLanguage::where('code', $languageCode)->update(['status' => $value]);

        if($value == 1){
            WebsiteLanguage::where('code', '!=', $languageCode)->update(['status' => 0]);
        } else {
            WebsiteLanguage::where('code', '!=', $languageCode)->update(['status' => 1]);
        }

        return response()->json(['success'=> 'Updated Successfully']);
    }


}
