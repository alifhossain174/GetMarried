<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use App\Models\BiodataQuestionAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        session(['currentTab' => 1]);

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
                'biodata_no' => 'SK'.time(),
                'biodata_type_id' => $request->biodata_type_id,
                'marital_condition_id' => $request->marital_condition_id,
                'birth_date' => $request->birth_date,
                'height_foot' => $request->height_foot,
                'height_inch' => $request->height_inch,
                'skin_tone' => $request->skin_tone,
                'weight' => $request->weight,
                'blood_group' => $request->blood_group,
                'nationality' => $request->nationality,
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Saved Successfully']);
        }
    }

    public function districtWiseUpazila(Request $request){
        $data = DB::table('upazilas')->where("district_id", $request->permenant_district_id)->get();
        return response()->json($data);
    }

    public function saveAddressBiodata(Request $request){
        $request->validate([
            'permenant_district_id' => ['required'],
            'permenant_upazila_id' => ['required'],
            'permenant_address' => ['required'],
            'present_district_id' => ['required'],
            'present_upazila_id' => ['required'],
            'present_address' => ['required'],
        ]);

        session(['currentTab' => 2]);

        $userId = Auth::user()->id;
        $biodata = BioData::where('user_id', $userId)->first();
        if($biodata){
            $biodata->permenant_district_id = $request->permenant_district_id;
            $biodata->permenant_upazila_id = $request->permenant_upazila_id;
            $biodata->permenant_address = $request->permenant_address;
            $biodata->present_district_id = $request->present_district_id;
            $biodata->present_upazila_id = $request->present_upazila_id;
            $biodata->present_address = $request->present_address;
            $biodata->updated_at = Carbon::now();
            $biodata->save();

            return response()->json(['success'=> 'Updated Successfully']);
        } else {
            BioData::insert([
                'user_id' => $userId,
                'biodata_no' => 'SK'.time(),
                'permenant_district_id' => $request->permenant_district_id,
                'permenant_upazila_id' => $request->permenant_upazila_id,
                'permenant_address' => $request->permenant_address,
                'present_district_id' => $request->present_district_id,
                'present_upazila_id' => $request->present_upazila_id,
                'present_address' => $request->present_address,
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Saved Successfully']);
        }

    }

    public function saveBiodataInfo(Request $request){
        $userId = Auth::user()->id;
        $biodata = BioData::where('user_id', $userId)->first();
        if($biodata){

            $index = 0;
            foreach($request->question as $question){

                $alreadyAnswered = BiodataQuestionAnswer::where([['user_id', $userId],['biodata_id', $biodata->id], ['question_set_id', $request->question_set_id[$index]], ['question_id', $question], ['answer', $request->answer[$index]]])->first();

                if(!$alreadyAnswered){
                    BiodataQuestionAnswer::where([['user_id', $userId],['biodata_id', $biodata->id], ['question_id', $question]])->delete();
                    BiodataQuestionAnswer::insert([
                        'user_id' => $userId,
                        'biodata_id' => $biodata->id,
                        'question_set_id' => $request->question_set_id[$index],
                        'question_id' => $question,
                        'answer' => $request->answer[$index],
                        'created_at' => Carbon::now()
                    ]);
                }

                $index++;
            }

            return response()->json(['success'=> 'Saved Successfully']);
        } else {
            $biodataId = BioData::insertGetId([
                'user_id' => $userId,
                'biodata_no' => 'SK'.time(),
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);

            $index = 0;
            foreach($request->question as $question){
                BiodataQuestionAnswer::insert([
                    'user_id' => $userId,
                    'biodata_id' => $biodataId,
                    'question_set_id' => $request->question_set_id[$index],
                    'question_id' => $question,
                    'answer' => $request->answer[$index],
                    'created_at' => Carbon::now()
                ]);
                $index++;
            }


            return response()->json(['success'=> 'Saved Successfully']);
        }
    }

    public function saveContactInfoBiodata(Request $request){

        $request->validate([
            'candidate_name' => ['required'],
            'gurdians_mobile_no' => ['required'],
            'relation_with_gurdian' => ['required'],
            'show_image' => ['required'],
            'email' => ['required'],
        ]);

        $userId = Auth::user()->id;
        $biodata = BioData::where('user_id', $userId)->first();
        if($biodata){

            $image = $biodata->image;
            if ($request->hasFile('image')){
                $get_image = $request->file('image');
                $image_name = str::random(5) . time() . '.' . $get_image->getClientOriginalExtension();
                $location = public_path('biodata_images/');
                $get_image->move($location, $image_name);
                $image = "biodata_images/" . $image_name;
            }

            $biodata->image = $image;
            $biodata->show_image = $request->show_image;
            $biodata->name = $request->candidate_name;
            $biodata->contact_no = $request->contact_no;
            $biodata->gurdians_mobile_no = $request->gurdians_mobile_no;
            $biodata->relation_with_gurdian = $request->relation_with_gurdian;
            $biodata->email = $request->email;
            $biodata->updated_at = Carbon::now();
            $biodata->save();

            return response()->json(['success'=> 'Updated Successfully']);
        } else {

            $image = null;
            if ($request->hasFile('image')){
                $get_image = $request->file('image');
                $image_name = str::random(5) . time() . '.' . $get_image->getClientOriginalExtension();
                $location = public_path('biodata_images/');
                $get_image->move($location, $image_name);
                $image = "biodata_images/" . $image_name;
            }

            BioData::insert([
                'user_id' => $userId,
                'biodata_no' => 'SK'.time(),
                'image' => $image,
                'show_image' => $request->show_image,
                'name' => $request->candidate_name,
                'contact_no' => $request->contact_no,
                'gurdians_mobile_no' => $request->gurdians_mobile_no,
                'relation_with_gurdian' => $request->relation_with_gurdian,
                'email' => $request->email,
                'slug' => str::random(5).time(),
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Saved Successfully']);
        }
    }
}
