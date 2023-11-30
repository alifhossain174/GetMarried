<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BiodataController extends Controller
{
    public function saveGeneralInfoBiodata(Request $request){

        $request->validate([
            'biodata_type_id' => ['required'],
            'marital_condition_id' => ['required'],
            'birth_date' => ['required'],
            'height_foot' => ['required'],
            'height_inch' => ['required'],
            'skin_tone' => ['required'],
            'weight' => ['required'],
            'blood_group' => ['required'],
            'nationality' => ['required'],
        ]);

        $userId = Auth::user()->id;
        $biodata = BioData::where('user_id', $userId)->first();
        if($biodata){
            $biodata->biodata_type_id = $request->biodata_type_id;
            $biodata->marital_condition_id = $request->marital_condition_id;
            $biodata->birth_date = $request->birth_date;
            $biodata->height_foot = $request->height_foot;
            $biodata->height_inch = $request->height_inch;
            $biodata->skin_tone = $request->skin_tone;
            $biodata->weight = $request->weight;
            $biodata->blood_group = $request->blood_group;
            $biodata->nationality = $request->nationality;
            $biodata->updated_at = Carbon::now();
            $biodata->save();

            return response()->json(['success'=> 'Updated Successfully']);
        } else {
            BioData::insert([
                'user_id' => $userId,
                'biodata_no' => time(),
                'biodata_type_id' => $request->biodata_type_id,
                'marital_condition_id' => $request->marital_condition_id,
                'birth_date' => $request->birth_date,
                'height_foot' => $request->height_foot,
                'height_inch' => $request->height_inch,
                'skin_tone' => $request->skin_tone,
                'weight' => $request->weight,
                'blood_group' => $request->blood_group,
                'nationality' => $request->nationality,
                'slug' => str::random(5)."-".time(),
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Saved Successfully']);
        }

    }
}
